VeryCD._tmpIndexChangedSrc=VeryCD._tmpIndexChangedSrc||[];VeryCD._delayShow=VeryCD._delayShow||[];function changeImageSrc4Rec(a,e){if(VeryCD._tmpIndexChangedSrc[a]){return false}var d=a.replace(/[^\d.]/g,"");var c=Sizzle("#"+e+"_"+d)[0].innerHTML;if(c!=undefined){var b=c.replace(/__src/g,"src");Sizzle("#"+e+"_"+d)[0].innerHTML=b;VeryCD._tmpIndexChangedSrc[a]=true}}VeryCD._tmpIndexShowTab=VeryCD._tmpIndexShowTab||[];VeryCD._isTime2Running="";function showtab(b,a){if(a==""){return false}if(VeryCD._tmpIndexShowTab[a]){return false}VeryCD._isTime2Running=a;ajaxgo(b,a)}function ajaxgo(b,a){if(a!=VeryCD._isTime2Running){return false}if(VeryCD._tmpIndexShowTab[a]){return false}VeryCD._tmpIndexShowTab[a]=1;$.ajax({url:a,type:"get",success:function(c){VeryCD.hidden_loading($(Sizzle("#"+b)[0]));Sizzle("#"+b)[0].innerHTML=c},beforeSend:function(){VeryCD.show_loading($(Sizzle("#"+b)[0]))},error:function(){VeryCD.hidden_loading($(Sizzle("#"+b)[0]));VeryCD.error("抱歉，网络故障，请重试！")}});return false}function getMusicRec(b,a){if(VeryCD._tmpIndexShowTab[b]){return false}VeryCD._tmpIndexShowTab[b]=1;$.ajax({url:"/base/ajax/entry/getMusicRecommendByFind/?"+a,type:"get",success:function(c){VeryCD.hidden_loading();Sizzle("#"+b)[0].innerHTML=c;VeryCD.iniHtml(Sizzle("#"+b)[0])},beforeSend:function(){VeryCD.show_loading()},error:function(){VeryCD.hidden_loading();VeryCD.error("抱歉，网络故障，请重试！")}});return false};