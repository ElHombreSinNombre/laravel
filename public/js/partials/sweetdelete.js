/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 75);
/******/ })
/************************************************************************/
/******/ ({

/***/ 18:
/***/ (function(module, exports) {

eval("$('body').on('click', '[data-click=\"delete\"]', function () {\n    var _this = this;\n\n    var elemento = $(this).data(\"elemento\");\n    swal({\n        title: \"¿Está seguro que desea eliminar '\" + elemento + \"'?\",\n        icon: \"warning\",\n        dangerMode: true,\n        buttons: [\"Cancelar\", \"Eliminar\"]\n    }).then(function (remove) {\n        if (remove) {\n            $.ajax({\n                type: 'GET',\n                url: $(_this).data(\"route\"),\n                success: function success() {\n                    swal({\n                        title: \"'\" + elemento + \"' ha sido eliminado satisfactoriamente.\",\n                        icon: \"success\",\n                        button: \"Aceptar\"\n                    }).then(function (confirm) {\n                        if (confirm) {\n                            window.location.reload();\n                        }\n                    });\n                },\n                error: function error(_error) {\n                    console.log(_error);\n                    swal({\n                        title: \"Hay un elemento relacionado con '\" + elemento + \"'. No se ha podido eliminar.\",\n                        icon: \"info\",\n                        button: \"Aceptar\"\n                    });\n                }\n            });\n        }\n    });\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMTguanMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vcmVzb3VyY2VzL2Fzc2V0cy9qcy9wYXJ0aWFscy9zd2VldGRlbGV0ZS5qcz9jNzY5Il0sInNvdXJjZXNDb250ZW50IjpbIiQoJ2JvZHknKS5vbignY2xpY2snLCAnW2RhdGEtY2xpY2s9XCJkZWxldGVcIl0nLCBmdW5jdGlvbiAoKSB7XHJcbiAgICB2YXIgZWxlbWVudG89ICQodGhpcykuZGF0YShcImVsZW1lbnRvXCIpO1xyXG4gICAgc3dhbCh7XHJcbiAgICAgICAgdGl0bGU6IFwiwr9Fc3TDoSBzZWd1cm8gcXVlIGRlc2VhIGVsaW1pbmFyICdcIiArIGVsZW1lbnRvICsgXCInP1wiLFxyXG4gICAgICAgIGljb246IFwid2FybmluZ1wiLFxyXG4gICAgICAgIGRhbmdlck1vZGU6IHRydWUsXHJcbiAgICAgICAgYnV0dG9uczogW1wiQ2FuY2VsYXJcIiwgXCJFbGltaW5hclwiXSxcclxuICAgIH0pXHJcbiAgICAudGhlbigocmVtb3ZlKSA9PiB7XHJcbiAgICAgICAgaWYgKHJlbW92ZSkge1xyXG4gICAgICAgICAgICAkLmFqYXgoe1xyXG4gICAgICAgICAgICAgICAgdHlwZTogJ0dFVCcsXHJcbiAgICAgICAgICAgICAgICB1cmw6ICQodGhpcykuZGF0YShcInJvdXRlXCIpLFxyXG4gICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICAgICAgICAgICAgIHN3YWwoe1xyXG4gICAgICAgICAgICAgICAgICAgICAgICB0aXRsZTogXCInXCIgKyBlbGVtZW50byArIFwiJyBoYSBzaWRvIGVsaW1pbmFkbyBzYXRpc2ZhY3RvcmlhbWVudGUuXCIsIFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBpY29uOiBcInN1Y2Nlc3NcIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uOiBcIkFjZXB0YXJcIixcclxuICAgICAgICAgICAgICAgICAgICB9KS50aGVuKChjb25maXJtKSA9PiB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChjb25maXJtKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB3aW5kb3cubG9jYXRpb24ucmVsb2FkKCk7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgICAgICAgICB9KVxyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZXJyb3IpIHtcclxuICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhlcnJvcik7XHJcbiAgICAgICAgICAgICAgICAgICAgc3dhbCh7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHRpdGxlOiBcIkhheSB1biBlbGVtZW50byByZWxhY2lvbmFkbyBjb24gJ1wiICsgZWxlbWVudG8gKyBcIicuIE5vIHNlIGhhIHBvZGlkbyBlbGltaW5hci5cIixcclxuICAgICAgICAgICAgICAgICAgICAgICAgaWNvbjogXCJpbmZvXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbjogXCJBY2VwdGFyXCIsXHJcbiAgICAgICAgICAgICAgICAgICAgfSlcclxuICAgICAgICAgICAgICAgIH1cclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG4gICAgfSlcclxufSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvcGFydGlhbHMvc3dlZXRkZWxldGUuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQUE7QUFDQTtBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUpBO0FBT0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBSEE7QUFLQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBSEE7QUFLQTtBQXJCQTtBQXVCQTtBQUNBO0FBQ0EiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }),

/***/ 75:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(18);


/***/ })

/******/ });