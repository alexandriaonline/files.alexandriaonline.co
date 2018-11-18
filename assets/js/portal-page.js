/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/portal-page.css');

var fileTable = document.getElementById('dataTable');
var newRow = fileTable.insertRow(1);
var firstCell = newRow.insertCell(0);
firstCell.innerHTML = 'John';
var secondCell = newRow.insertCell(1);
secondCell.innerHTML = 'Doe';
var thirdCell = newRow.insertCell(2);
thirdCell.innerHTML = 'Something';
var fifthCell = newRow.insertCell(3);
fifthCell.innerHTML = 'Something';
var fourthCell = newRow.insertCell(4);
fourthCell.innerHTML = 'Metadata';

// assetRows.item(0).insertAdjacentHTML('afterbegin', '<tr class="asset_row new_row"><td>Hello</td><td>World</td><td>Something</td></tr>');

/*!
 * Start Bootstrap - SB Admin v5.0.2 (https://startbootstrap.com/template-overviews/sb-admin)
 * Copyright 2013-2018 Start Bootstrap
 * Licensed under MIT (https://github.com/BlackrockDigital/startbootstrap-sb-admin/blob/master/LICENSE)
 */

!function(t){"use strict";t("#sidebarToggle").click(function(e){e.preventDefault(),t("body").toggleClass("sidebar-toggled"),t(".sidebar").toggleClass("toggled")}),t("body.fixed-nav .sidebar").on("mousewheel DOMMouseScroll wheel",function(e){if(768<$window.width()){var o=e.originalEvent,t=o.wheelDelta||-o.detail;this.scrollTop+=30*(t<0?1:-1),e.preventDefault()}}),t(document).scroll(function(){100<t(this).scrollTop()?t(".scroll-to-top").fadeIn():t(".scroll-to-top").fadeOut()}),t(document).on("click","a.scroll-to-top",function(e){var o=t(this);t("html, body").stop().animate({scrollTop:t(o.attr("href")).offset().top},1e3,"easeInOutExpo"),e.preventDefault()})}(jQuery);