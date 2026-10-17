#!/usr/bin/env bash
set -e

DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
TMP_DIR="/tmp/tfa5-deploy-$$"
OUTPUT_ZIP="$DIR/tfa5-infinityfree.zip"

echo "==> Building frontend assets for production..."
npm run build

echo "==> Packaging lean production build for deployment (tfa5.freedev.app)..."
rm -rf "$TMP_DIR" "$OUTPUT_ZIP"
mkdir -p "$TMP_DIR"

# Copy non-hidden source files, excluding development directories and archives
rsync -av \
  --exclude=".*" \
  --exclude="vendor" \
  --exclude="node_modules" \
  --exclude="tests" \
  --exclude="*.zip" \
  --exclude="build-infinityfree-zip.sh" \
  "$DIR/" "$TMP_DIR/" > /dev/null

# Copy essential root configuration files
[ -f "$DIR/.env.example" ] && cp "$DIR/.env.example" "$TMP_DIR/.env.example"
[ -f "$DIR/.htaccess" ] && cp "$DIR/.htaccess" "$TMP_DIR/.htaccess"
[ -f "$DIR/public/.htaccess" ] && cp "$DIR/public/.htaccess" "$TMP_DIR/public/.htaccess"

# Use production env template if available
if [ -f "$DIR/env.production" ]; then
    cp "$DIR/env.production" "$TMP_DIR/.env"
elif [ -f "$DIR/.env.production" ]; then
    cp "$DIR/.env.production" "$TMP_DIR/.env"
fi

# Ensure storage directories exist with proper structure
mkdir -p "$TMP_DIR/storage/app/public" \
         "$TMP_DIR/storage/framework/cache/data" \
         "$TMP_DIR/storage/framework/sessions" \
         "$TMP_DIR/storage/framework/views" \
         "$TMP_DIR/storage/logs" \
         "$TMP_DIR/bootstrap/cache"

# Install lean production vendor dependencies (excluding development tools)
cd "$TMP_DIR"
composer install --no-dev --optimize-autoloader --no-interaction --quiet

# Create deployment archive
zip -r "$OUTPUT_ZIP" . -x "*.DS_Store" > /dev/null
rm -rf "$TMP_DIR"

# Validate package integrity
echo "==> Verifying package contents..."
for req in "public/index.php" "artisan" "vendor/autoload.php" "public/build/manifest.json"; do
    if ! unzip -l "$OUTPUT_ZIP" | grep -q "$req"; then
        echo "Error: Required file $req is missing from $OUTPUT_ZIP" >&2
        exit 1
    fi
done

echo "==> Verification passed! All required files are present."
echo "==> Build successful: $OUTPUT_ZIP"
ls -lh "$OUTPUT_ZIP"
