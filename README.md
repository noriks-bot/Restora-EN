# Restora-SI

WordPress theme + plugins for **Restora** brand, market **SI**.

- **Subdomain:** `en-restora.noriks.com` → brand-machine (18.197.40.171)
- **Theme:** `restora/` (Shopify-clone served via front-page.php)
- **Plugins:** `plugins/` (only managed plugins, WP defaults excluded)
- **Demo product:** Soya Silk Duvet (created via WooCommerce REST)

## Structure
```
restora-repo/
├── restora/                # WP theme (symlinked from wp-content/themes/restora)
│   ├── front-page.php       # serves Shopify clone HTML + injects WC add-to-cart
│   └── assets/restora-clone/   # static HTML + assets
└── plugins/
    └── woocommerce/         # WooCommerce plugin (symlinked)
```

## Deploy
On brand-machine:
```
cd /var/www/restora/en/.restora-repo
GIT_SSH_COMMAND='ssh -i ~/.ssh/github_noriks' git pull
```

## ADD TO CART
The front-page.php injects a JS handler that POSTs to `/?wc-ajax=add_to_cart` with the demo product ID. Triggered on any visible button matching selectors like `button.add-to-cart`, `button[name=add]`, etc.
