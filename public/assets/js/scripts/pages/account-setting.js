/*=========================================================================================
	File Name: account-setting.js
	Description: Account setting.
	----------------------------------------------------------------------------------------
	Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
	Author: PIXINVENT
	Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function () {
  // language select
  var languageselect = $("#languageSelect").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });
  
  var languageselect = $("#accountSelect").select2({
    dropdownAutoWidth: true,
    width: '100%'
  });
  
  // birthdate date
  $('.birthdate-picker').pickadate({
    format: 'd, mmmm, yyyy'
  });
});
