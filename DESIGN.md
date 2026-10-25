---
name: POS Foundations
description: Artisan Market & Retail Docket Design System for Laravel 11 Foundations
colors:
  primary: "#173c2a"
  primary-hover: "#0f281c"
  accent: "#c94c38"
  accent-hover: "#b33e2c"
  neutral-bg: "#fff8e8"
  surface: "#fffdf7"
  surface-subtle: "#f5eedc"
  border: "#e6dcbe"
  text: "#173c2a"
  text-muted: "#425849"
  text-inverse: "#fff8e8"
  sage: "#3f5947"
  sage-surface: "#e2ede4"
typography:
  display:
    fontFamily: "Bricolage Grotesque, -apple-system, sans-serif"
    fontSize: "clamp(1.75rem, 4vw, 2.5rem)"
    fontWeight: 700
    lineHeight: 1.15
    letterSpacing: "-0.02em"
  body:
    fontFamily: "Bricolage Grotesque, -apple-system, sans-serif"
    fontSize: "1rem"
    fontWeight: 400
    lineHeight: 1.5
    letterSpacing: "normal"
  mono:
    fontFamily: "IBM Plex Mono, ui-monospace, monospace"
    fontSize: "0.9375rem"
    fontWeight: 500
    lineHeight: 1.4
    letterSpacing: "-0.01em"
rounded:
  sm: "2px"
  md: "4px"
  lg: "8px"
spacing:
  xs: "4px"
  sm: "8px"
  md: "16px"
  lg: "24px"
  xl: "32px"
components:
  button-primary:
    backgroundColor: "{colors.primary}"
    textColor: "{colors.text-inverse}"
    rounded: "{rounded.md}"
    padding: "10px 20px"
  button-primary-hover:
    backgroundColor: "{colors.primary-hover}"
  button-accent:
    backgroundColor: "{colors.accent}"
    textColor: "{colors.text-inverse}"
    rounded: "{rounded.md}"
    padding: "10px 20px"
  button-accent-hover:
    backgroundColor: "{colors.accent-hover}"
  badge-category:
    backgroundColor: "{colors.sage-surface}"
    textColor: "{colors.sage}"
    rounded: "{rounded.sm}"
    padding: "4px 8px"
---

## Overview

POS Foundations shares the **Bright-Market Design System**: an artisan market docket aesthetic. The interface is optimized strictly for **Surface Mode: Operate**, providing a clean, accessible foundation across the four core views (Home, Customers, Users, About).

**The Ledger Rule.** Treat the viewport as a shopkeeper's physical ledger: warm cream paper stock (`#fff8e8`), deep basil ink (`#173c2a`), and tomato accent stamps (`#c94c38`). High-density tabular listings outrank decorative trends.

## Colors

- **Primary (`#173c2a`, Deep Basil)**: Used for brand headers, main navigation, table column headers, and primary submit buttons.
- **Accent (`#c94c38`, Tomato Red)**: High-consequence visual triggers, notification tags, and active navigation indicators.
- **Neutral Background (`#fff8e8`, Warm Cream)**: Calibrated for glare reduction and long-shift cashier comfort.
- **Surface (`#fffdf7`) & Subtle (`#f5eedc`)**: Clean card and table alternating rows.
- **Border (`#e6dcbe`, Ledger Cream)**: Subtle structural boundary lines.
- **Text Primary (`#173c2a`) & Text Muted (`#425849`)**: High-contrast, WCAG AA compliant text hierarchy.

## Typography

- **Bricolage Grotesque**: Display titles, navigation links, and section headings.
- **IBM Plex Mono**: Tabular numerals, customer codes, user IDs, dates, and currency values.

**The Tabular Rule.** Every numeric table column must be rendered with `font-variant-numeric: tabular-nums` and right-aligned.

## Layout

- Responsive 12-column grid container maxing at `1280px`.
- High-density data tables for Customer and User rosters.
- Minimum interactive click/tap hit target of `44px`.

## Elevation & Depth

- Crisp 1px solid borders (`border: 1px solid var(--border-subtle)`).
- Hard offset stamps (`box-shadow: 0 1px 2px rgba(23, 60, 42, 0.08)`).
- 1px physical press translation on `:active`.

## Shapes

- Restrained corner rounding: `2px` for badges, `4px` for buttons/inputs, `8px` for containers.
- Visible focus indicator: `2px solid #c94c38` with `2px` offset.

## Components

### Table Rosters
- Striped alternating row backgrounds using `#fffdf7` and `#f5eedc`.
- Padded table cells (`12px 16px`) for comfortable reading.
- Monospace customer/user identification codes.

### Navigation Header
- Prominent docket brand tag (`TFA-05 • Laravel MVC`).
- Numbered navigation items (`01 Home`, `02 Customers`, `03 Users`, `04 About`).

## Do's and Don'ts

### Do's
- **Do** maintain the shared Bright-Market visual language with `tfa6`.
- **Do** use right-aligned monospace numerals for all numeric data.
- **Do** provide clean skip navigation links for accessibility.

### Don'ts
- **Don't** add generic gradients or unstyled drop-shadows.
- **Don't** use low-contrast gray text on cream backgrounds.
- **Don't** allow horizontal overflow on mobile viewports.
