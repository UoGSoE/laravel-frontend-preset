/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Creates a new promise that automatically resolves after some timeout:
Promise.delay = function (time) {
  return new Promise((resolve, reject) => {
    setTimeout(resolve, time);
  });
};

// Throttle this promise to resolve no faster than the specified time:
Promise.prototype.takeAtLeast = function (time) {
  return new Promise((resolve, reject) => {
    Promise.all([this, Promise.delay(time)]).then(([result]) => {
      resolve(result);
    }, reject);
  });
};

window.moment = require("moment");
import Pikaday from "pikaday";
import "pikaday/css/pikaday.css";
Vue.directive("pikaday", {
  bind: (el, binding) => {
    el.pikadayInstance = new Pikaday({
      field: el,
      format: "DD/MM/YYYY",
      onSelect: () => {
        var event = new Event("input", { bubbles: true });
        el.value = el.pikadayInstance.toString();
        el.dispatchEvent(event);
      }
      // add more Pikaday options below if you need
      // all available options are listed on https://github.com/dbushell/Pikaday
    });
  },

  unbind: el => {
    el.pikadayInstance.destroy();
  }
});

const app = new Vue({
  el: "#app",
});
