$(document).ready(function () {$("#submit-2124819609").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#saving").fadeIn();}, data:$("#submit-2124819609").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#saving").fadeOut();$("#success").html(data);}, type:"post", url:"\/GlenesLincaroProject\/users\/add"});
return false;});});