webpackJsonp([8],{"./src/login/containers/LogoutPage.js":function(e,t,n){"use strict";function o(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function r(e,t){if(!e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return!t||"object"!=typeof t&&"function"!=typeof t?e:t}function i(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function, not "+typeof t);e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,enumerable:!1,writable:!0,configurable:!0}}),t&&(Object.setPrototypeOf?Object.setPrototypeOf(e,t):e.__proto__=t)}Object.defineProperty(t,"__esModule",{value:!0});var c=n("./node_modules/react/react.js"),u=n.n(c),a=n("./src/common/components/CookieHelper.js"),s=n("./node_modules/axios/index.js"),l=n.n(s),f=function(){function e(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(t,n,o){return n&&e(t.prototype,n),o&&e(t,o),t}}(),p=n("./src/common/constants/apiServerConstants.js"),b=function(e){function t(e){return o(this,t),r(this,(t.__proto__||Object.getPrototypeOf(t)).call(this,e))}return i(t,e),f(t,[{key:"componentDidMount",value:function(){l.a.get(p.API_SERVER+"/static/logoutPage").then(function(e){n.i(a.b)("AUTHCHECKSUM"),window.location.href="/login"})}},{key:"render",value:function(){return null}}]),t}(u.a.Component);t.default=b}});