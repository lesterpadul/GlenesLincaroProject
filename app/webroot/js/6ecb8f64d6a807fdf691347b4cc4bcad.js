$(document).ready(function () {$("#submit-1133542854").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#loggingIn").fadeIn();}, data:$("#submit-1133542854").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#loggingIn").fadeOut();$("#success").html(data);}, type:"post", url:"\/GlenesLincaroProject\/login"});
return false;});});