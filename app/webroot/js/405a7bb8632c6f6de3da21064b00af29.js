$(document).ready(function () {$("#submit-472975561").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#loggingIn").fadeIn();}, data:$("#submit-472975561").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#loggingIn").fadeOut();$("#success").html(data);}, type:"post", url:"\/GlenesLincaroProject\/login"});
return false;});});