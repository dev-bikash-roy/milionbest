The project is for a public-facing tool website hosted at **millionbest.com**. Please use that domain for all:

✅ SEO defaults:
- Site title: "MillionBest – Free Online Tools"
- Meta description: "Powerful and privacy-friendly online tools for PDF, text, code, resume, and productivity — all in one place at MillionBest.com."

✅ Hero layout (homepage):
- Top headline: “The Best Free Tools in One Place”
- Subtext: “Merge PDFs, Write Resumes, Format JSON, Compress Images and more — no sign-up required.”
- Primary CTA: "Explore All Tools"
- Include a spot for site logo (`/assets/logo.png`) and favicon

✅ Footer:
- Add © 2025 MillionBest.com
- Include links: Privacy Policy, Terms, Contact Us

✅ Admin Panel default:
- Site title in admin: "MillionBest Admin"
- Login screen shows “Welcome to MillionBest Tools Dashboard”

This repository contains a simple PHP 8.1 application for MillionBest.com. Each tool is self-contained under the `/tools` directory and uses native PHP includes for templating. Global settings are stored in `settings.json` and `tools.json` for easy deployment on shared hosting.

Run `composer install` to fetch third‑party libraries (dompdf and endroid/qr-code). Due to the environment, Composer cannot be run in this repository.
