# MillionBest Toolkit

This is a lightweight PHP 8.1 toolkit designed for shared hosting. It serves several small utilities with a Tailwind CSS UI and a single front controller.

## Setup
1. Install dependencies with Composer:
   ```bash
   composer install
   ```
2. Point your web root to the `public` folder. `.htaccess` rewrites pretty URLs to `index.php`.
3. Update configuration files in `config/` for SEO settings and tool metadata.

## Included Tools
- Word Counter
- JSON Formatter
- QR Code Generator

Additional tools can be added under the `tools/` directory using the same structure.
