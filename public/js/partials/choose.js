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
/******/ 	return __webpack_require__(__webpack_require__.s = 68);
/******/ })
/************************************************************************/
/******/ ({

/***/ 11:
/***/ (function(module, exports) {

eval("$(\"[name=activado]\").bootstrapSwitch({\n    'onColor': 'success',\n    'onText': 'Activado',\n    'offColor': 'danger',\n    'offText': 'Desactivado'\n});\n\n/*$(\":checkbox\").on('switchChange.bootstrapSwitch', function () {\r\n    var opcion = $(\":checkbox\").bootstrapSwitch('state');\r\n    $.ajax({\r\n        headers: {\r\n            'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\r\n        },\r\n        url: 'listado',\r\n        type: 'POST',\r\n        data: {'opcion': opcion},\r\n    })\r\n});*///# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMTEuanMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vcmVzb3VyY2VzL2Fzc2V0cy9qcy9wYXJ0aWFscy9jaG9vc2UuanM/MzUzYyJdLCJzb3VyY2VzQ29udGVudCI6WyIkKFwiW25hbWU9YWN0aXZhZG9dXCIpLmJvb3RzdHJhcFN3aXRjaCh7XHJcbiAgICAnb25Db2xvcic6ICdzdWNjZXNzJyxcclxuICAgICdvblRleHQnOiAnQWN0aXZhZG8nLFxyXG4gICAgJ29mZkNvbG9yJzogJ2RhbmdlcicsXHJcbiAgICAnb2ZmVGV4dCc6ICdEZXNhY3RpdmFkbycsXHJcbn0pO1xyXG5cclxuLyokKFwiOmNoZWNrYm94XCIpLm9uKCdzd2l0Y2hDaGFuZ2UuYm9vdHN0cmFwU3dpdGNoJywgZnVuY3Rpb24gKCkge1xyXG4gICAgdmFyIG9wY2lvbiA9ICQoXCI6Y2hlY2tib3hcIikuYm9vdHN0cmFwU3dpdGNoKCdzdGF0ZScpO1xyXG4gICAgJC5hamF4KHtcclxuICAgICAgICBoZWFkZXJzOiB7XHJcbiAgICAgICAgICAgICdYLUNTUkYtVE9LRU4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXHJcbiAgICAgICAgfSxcclxuICAgICAgICB1cmw6ICdsaXN0YWRvJyxcclxuICAgICAgICB0eXBlOiAnUE9TVCcsXHJcbiAgICAgICAgZGF0YTogeydvcGNpb24nOiBvcGNpb259LFxyXG4gICAgfSlcclxufSk7Ki9cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gcmVzb3VyY2VzL2Fzc2V0cy9qcy9wYXJ0aWFscy9jaG9vc2UuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFKQTtBQUNBO0FBTUE7Ozs7Ozs7Ozs7QSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }),

/***/ 68:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(11);


/***/ })

/******/ });