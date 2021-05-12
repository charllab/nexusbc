# Wordpress Boilerplate

This development environment requires Node v7.5+. This is the only global dependency. You can download Node **[here](https://nodejs.org/)**.

## Project Setup

**1. Install Dependencies**

```
npm install
```

**2. Install Wordpress**

On the first run we need to install WordPress, we do this once by running the following command. It will fetch the latest WordPress version, which is the build we use for the development server.

First generate a set of keys using the [WordPress random generator](https://api.wordpress.org/secret-key/1.1/salt) and replace keys in `wp-config.php` then install.

```
npm run install:wordpress
```

**3. Update Theme / Other Files**

- Update the theme folder name found under `src/themes`.
- Update the `package.json` file to match the repo name.
- Update the `src/themes/boilerplate/style.css` "Theme Name".

**4. Create .env File**

- Duplicate the `.env.example` and rename to `.env`, then proceed to fill out env constants and create a new database if needed.

**5. Start Workflow**

- We are ready to start our development server with the command:

```
gulp dev
```

**6. Wordpress Plugins**

- If you want to add or build WordPress plugins, you can do that from the directory:

```
src/plugins/
```

**7. Production Files**

- To generate your distribution files run the command:

```
gulp prod
```

## Wordpress Boilerplate

You can access the Wordpress control panel using your virtual host address, for example: `yourdomain.dev/wordpress/wp-admin`. You can log in with the following credentials and please remember to change the password when making the website available to the public.

* Email: `admin@sproing.ca`
* Password: `demopass`

### Initial Content

You can copy over assets manually from our `src/boilerplate-assets` folder such as initial uploads.

### Required Plugins

*  [Advanced Custom Fields](https://www.advancedcustomfields.com/)

## External Libraries

Including external JavaScript libraries is as simple as installing the npm script and including it in the **gulpfile.js** same goes for CSS libraries.

```
const headerJS = [
    'node_modules/bootstrap/dist/js/bootstrap.bundle.min.js',
    'node_modules/moment/min/moment.min.js',
    'node_modules/jquery-mask-plugin/dist/jquery.mask.min.js',
    'node_modules/parsleyjs/dist/parsley.min.js',
    'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
    'node_modules/selectize/dist/js/standalone/selectize.min.js',
    'node_modules/aos/dist/aos.js',
    'src/js/modernizr.custom.js',
    'node_modules/owl.carousel/dist/owl.carousel.min.js'
];

const footerJS = [
    'src/js/app.js'
];

const libsCSS = [
    'node_modules/owl.carousel/dist/assets/owl.carousel.css'
];
```

You can include the scripts in the head of the page before the DOM is loaded by placing them in the **headerJS** array or in the footer of the page after the DOM is loaded in the **footerJS** array. Only footer scripts are processed with Babel thus supporting ES6, however you can change this in the configuration if you want to run both header and footer scripts with Babel.

You can add CSS libraries that don't need preprocessing here too.

A build restart is required for changes to take effect.

### Included JS Libraries

- AOS - Animate On Scroll Library