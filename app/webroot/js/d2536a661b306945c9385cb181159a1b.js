$(document).ready(function () {$("#submit-756518816").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#saving").fadeIn();}, data:$("#submit-756518816").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#saving").fadeOut();$("#success").html(data);}, type:"post", url:"\/GlenesLincaroProject\/users\/add"});
return false;});});