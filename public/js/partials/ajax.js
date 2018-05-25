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
/******/ 	return __webpack_require__(__webpack_require__.s = 66);
/******/ })
/************************************************************************/
/******/ ({

/***/ 66:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(9);


/***/ }),

/***/ 9:
/***/ (function(module, exports) {

eval("$('body').on('ifChanged', \"[data-click='permisos']\", function () {\n    var department_id = $(this).val();\n    var security_element_id = $(this).data(\"valuetwo\");\n    $.ajax({\n        headers: {\n            'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n        },\n        url: 'permisos/guardar',\n        type: 'post',\n        data: { departments_id: department_id, security_element_id: security_element_id },\n        success: function success() {\n            swal({\n                title: \"El elemento ha sido modificado satisfactoriamente.\",\n                icon: \"success\",\n                button: \"Aceptar\"\n            });\n        },\n        error: function error(_error) {\n            console.log(_error);\n            swal({\n                title: \"No se ha podido modificar el elemento.\",\n                icon: \"warning\",\n                button: \"Aceptar\"\n            });\n        }\n    });\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiOS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL3BhcnRpYWxzL2FqYXguanM/NDdmNiJdLCJzb3VyY2VzQ29udGVudCI6WyIkKCdib2R5Jykub24oJ2lmQ2hhbmdlZCcsIFwiW2RhdGEtY2xpY2s9J3Blcm1pc29zJ11cIiwgZnVuY3Rpb24oKSB7XHJcbiAgICB2YXIgZGVwYXJ0bWVudF9pZD0gJCh0aGlzKS52YWwoKTtcclxuICAgIHZhciBzZWN1cml0eV9lbGVtZW50X2lkPSAkKHRoaXMpLmRhdGEoXCJ2YWx1ZXR3b1wiKTtcclxuICAgICQuYWpheCh7XHJcbiAgICAgICAgaGVhZGVyczoge1xyXG4gICAgICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgdXJsOiAncGVybWlzb3MvZ3VhcmRhcicsXHJcbiAgICAgICAgdHlwZTogJ3Bvc3QnLFxyXG4gICAgICAgIGRhdGE6IHtkZXBhcnRtZW50c19pZDpkZXBhcnRtZW50X2lkLCBzZWN1cml0eV9lbGVtZW50X2lkOiBzZWN1cml0eV9lbGVtZW50X2lkfSxcclxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIHN3YWwoe1xyXG4gICAgICAgICAgICAgICAgdGl0bGU6IFwiRWwgZWxlbWVudG8gaGEgc2lkbyBtb2RpZmljYWRvIHNhdGlzZmFjdG9yaWFtZW50ZS5cIixcclxuICAgICAgICAgICAgICAgIGljb246IFwic3VjY2Vzc1wiLFxyXG4gICAgICAgICAgICAgICAgYnV0dG9uOiBcIkFjZXB0YXJcIlxyXG4gICAgICAgICAgICB9KTsgXHJcbiAgICAgICAgfSxcclxuICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGVycm9yKSB7XHJcbiAgICAgICAgICAgIGNvbnNvbGUubG9nKGVycm9yKTtcclxuICAgICAgICAgICAgc3dhbCh7XHJcbiAgICAgICAgICAgICAgICB0aXRsZTogXCJObyBzZSBoYSBwb2RpZG8gbW9kaWZpY2FyIGVsIGVsZW1lbnRvLlwiLFxyXG4gICAgICAgICAgICAgICAgaWNvbjogXCJ3YXJuaW5nXCIsXHJcbiAgICAgICAgICAgICAgICBidXR0b246IFwiQWNlcHRhclwiLFxyXG4gICAgICAgICAgICB9KVxyXG4gICAgICAgIH1cclxuICAgIH0pO1xyXG59KTsgXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvcGFydGlhbHMvYWpheC5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBREE7QUFHQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBSEE7QUFLQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUhBO0FBS0E7QUFyQkE7QUF1QkEiLCJzb3VyY2VSb290IjoiIn0=");

/***/ })

/******/ });