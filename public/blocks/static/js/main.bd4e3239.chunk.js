(this.webpackJsonpblocks=this.webpackJsonpblocks||[]).push([[0],{20:function(e,t,n){e.exports=n(34)},25:function(e,t,n){},33:function(e,t,n){},34:function(e,t,n){"use strict";n.r(t);var r,c=n(1),o=n.n(c),a=n(14),i=n.n(a),l=(n(25),n(8)),u=n(45),s=n(47);!function(e){e[e.INIT=0]="INIT",e[e.LOADING=1]="LOADING",e[e.LOADED=2]="LOADED",e[e.ERROR=3]="ERROR"}(r||(r={}));var f,d=n(4);!function(e){e[e.ACTIVE=0]="ACTIVE",e[e.BLOCKED=1]="BLOCKED"}(f||(f={}));var m=n(5);function p(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function O(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?p(n,!0).forEach((function(t){Object(d.a)(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):p(n).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}var b=function(e,t){var n=e,r=n.selectedIndex,c=n.blocks;return null!=r&&r!==t?(c=function(e,t,n){var r=Object(m.clone)(e[t]);return e[t]=Object(m.clone)(e[n]),e[n]=r,e}(c,r,t),e.moved=(e.moved?e.moved:0)+1,e=v(O({},e,{blocks:c})),r=null):r=t,O({},e,{selectedIndex:r})};function v(e){var t=e.blocks;e.completed;return O({},e,{blocks:t=t.map((function(e,t){return e.activePosition=t,e.state=e.activePosition===e.originPosition?f.BLOCKED:f.ACTIVE,e})),completed:Object(m.sumBy)(t,(function(e){return e&&e.state===f.BLOCKED?1:0}))===t.length})}var g=function(e){var t=Object(c.useState)({status:r.INIT}),n=Object(l.a)(t,2),o=n[0],a=n[1];return Object(c.useEffect)((function(){fetch("https://hiwarsaw.herokuapp.com/api-place/:id".replace(":id","".concat(e)),{mode:"cors",headers:{"Access-Control-Allow-Origin":"*"}}).then((function(e){return e.json()})).then((function(e){return a({status:r.LOADED,payload:v(e)})})).catch((function(e){return a({status:r.ERROR,error:e})}))}),[e]),o},E=n(46),h=Object(u.a)((function(e){return Object(s.a)({selected:{margin:"2px",border:"2px solid #ff0000",textAlign:"center",width:"15vw",height:"15vw",cursor:"pointer",backgroundSize:"cover",filter:"grayscale(100%)",color:"#fff"},element:{margin:"3px",background:"#e3e3e3",textAlign:"center",width:"15vw",height:"15vw",cursor:"pointer",backgroundSize:"cover",filter:"grayscale(100%)",color:"#fff",fontWeight:"bolder"},correct:{margin:"2px",textAlign:"center",width:"15vw",height:"15vw",cursor:"no-drop",backgroundSize:"cover"}})})),j=function(e){var t=e.block,n=e.selected,r=e.fnClick,c=h();return o.a.createElement(E.a,{item:!0,xs:2,key:t.image,className:function(){var e=c.element;return t.activePosition===n&&(e=c.selected),t.state===f.BLOCKED&&(e=c.correct),e}(),style:{backgroundImage:"url(https://hiwarsaw.herokuapp.com".concat(t.image)},onClick:function(){return r(t)}},t.activePosition," - ",t.originPosition)},k=(n(33),function(e){var t=e.game,n=e.fnClick;if(void 0===t)return c.createElement("span",null);var r=t.blocks;return c.createElement(c.Fragment,null,c.createElement(E.a,{container:!0,direction:"row",justify:"center",alignItems:"center",spacing:1},r.map((function(e){return c.createElement(j,{key:e.image,block:e,selected:t.selectedIndex,fnClick:n})}))),t.completed&&c.createElement("span",null,"Gratulacje uda\u0142o Ci si\u0119 u\u0142o\u017cy\u0107 miejsce, mo\u017cesz podzieli\u0107 si\u0119 tym"),c.createElement("div",null,"Ilo\u015b\u0107 ruch\xf3w: ",t.moved))}),w=Object(u.a)((function(e){return Object(s.a)({root:{}})})),y=function(){var e=Object(c.useState)(),t=Object(l.a)(e,2),n=t[0],a=t[1],i=g(Object(m.get)(window,"hwPlaceId",null)),u=w();return Object(c.useEffect)((function(){i.status===r.LOADED&&a(i.payload)}),[i]),o.a.createElement("div",{className:u.root},i.status===r.LOADING&&o.a.createElement("div",null,"Loading..."),i.status===r.LOADED&&o.a.createElement(k,{game:n,fnClick:function(e){if(n)if(e.state!==f.BLOCKED){var t=b(n,e.activePosition);a(t)}else alert("Element in correct place")}}),i.status===r.ERROR&&o.a.createElement("div",null,"Error, the backend moved to the dark side."))};i.a.render(o.a.createElement(y,null),document.getElementById("root"))}},[[20,1,2]]]);
//# sourceMappingURL=main.bd4e3239.chunk.js.map