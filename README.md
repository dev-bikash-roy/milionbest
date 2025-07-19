# AI Tools Web Suite

This PHP-based web suite provides AI-powered utilities such as blog writing, SEO keyword suggestions, an invoice generator, and a CV generator. It uses a simple front controller and Router AI API integration. Tools are organized into categories loaded from configuration files so you can easily expand the suite.

## Setup
1. Install dependencies with Composer:
   ```bash
   composer install
   ```
2. Configure API keys and site settings in `config/settings.json`.
3. Review available categories in `config/categories.json` and assign categories to each tool in `config/tools.json`.
4. Point your web root to the `public` folder.

## Tools
- Blog Writer *(Blog Tools)*
- SEO Keyword Generator *(SEO Tools)*
- Invoice Generator *(Business)*
- CV Generator *(Personal Tools)*

Additional categories are predefined in `config/categories.json` including Blog Workflow, YouTube Tools, Code Tools and more. Create new tool entries and assign them to any category to extend the application.
