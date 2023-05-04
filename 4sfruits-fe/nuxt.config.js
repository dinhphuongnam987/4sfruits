export default {
  target: "static",
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: "4sfruits-fe",
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: "" },
      { name: "format-detection", content: "telephone=no" },
    ],
    link: [
      { rel: "icon", type: "image/x-icon", href: "/favicon.ico" },
      {
        rel: "stylesheet",
        href: "https://fonts.googleapis.com/css?family=Open+Sans:300,400,700",
      },
      {
        rel: "stylesheet",
        href: "https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap",
      },
      {
        rel: "stylesheet",
        href: "https://fonts.googleapis.com/css?family=Kaushan+Script|Source+Sans+Pro",
      },
      { rel: "stylesheet", href: "/assets/css/all.min.css" },
      { rel: "stylesheet", href: "/assets/bootstrap/css/bootstrap.min.css" },
      { rel: "stylesheet", href: "/assets/css/owl.carousel.css" },
      { rel: "stylesheet", href: "/assets/css/magnific-popup.css" },
      { rel: "stylesheet", href: "/assets/css/animate.css" },
      { rel: "stylesheet", href: "/assets/css/meanmenu.min.css" },
      { rel: "stylesheet", href: "/assets/css/main.css" },
      { rel: "stylesheet", href: "/assets/css/responsive.css" },
    ],
    script: [
      { src: "/assets/js/jquery-1.11.3.min.js", body: true },
      { src: "/assets/bootstrap/js/bootstrap.min.js", body: true },
      { src: "/assets/js/jquery.countdown.js", body: true },
      { src: "/assets/js/jquery.isotope-3.0.6.min.js", body: true },
      { src: "/assets/js/waypoints.js", body: true },
      { src: "/assets/js/owl.carousel.min.js", body: true },
      { src: "/assets/js/jquery.magnific-popup.min.js", body: true },
      { src: "/assets/js/jquery.meanmenu.min.js", body: true },
      { src: "/assets/js/sticker.js", body: true },
      { src: "/assets/js/main.js", body: true },
    ],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [{ src: "~/plugins/notifications.js", ssr: false }],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: [
    {
      path: "~/components", // will get any components nested in let's say /components/test too
      pathPrefix: false,
    },
  ],

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    "@nuxtjs/axios",
    // https://go.nuxtjs.dev/pwa
    "@nuxtjs/pwa",
    // https://go.nuxtjs.dev/content
    "@nuxt/content",

    "@nuxtjs/dayjs",
  ],

  // Optional
  dayjs: {
    locales: ["en", "ja"],
    defaultLocale: "en",
    defaultTimeZone: "Asia/Tokyo",
    plugins: [
      "utc", // import 'dayjs/plugin/utc'
      "timezone", // import 'dayjs/plugin/timezone'
    ], // Your Day.js plugin
  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    // Workaround to avoid enforcing hard-coded localhost:3000: https://github.com/nuxt-community/axios-module/issues/308
    baseURL: "http://127.0.0.1:8000/api/v1",
  },

  // PWA module configuration: https://go.nuxtjs.dev/pwa
  pwa: {
    manifest: {
      lang: "en",
    },
  },

  // Content module configuration: https://go.nuxtjs.dev/config-content
  content: {},

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},
  generate: {
    fallback: true,
  },
};
