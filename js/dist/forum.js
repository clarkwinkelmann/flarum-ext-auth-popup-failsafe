(()=>{var e={n:t=>{var o=t&&t.__esModule?()=>t.default:()=>t;return e.d(o,{a:o}),o},d:(t,o)=>{for(var r in o)e.o(o,r)&&!e.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:o[r]})},o:(e,t)=>Object.prototype.hasOwnProperty.call(e,t),r:e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})}},t={};(()=>{"use strict";e.r(t);const o=flarum.core.compat["common/extend"],r=flarum.core.compat["forum/app"];var a=e.n(r);const n=flarum.core.compat["forum/ForumApplication"];var i=e.n(n),u=new URLSearchParams(window.location.search).get("authenticationComplete");u&&window.history.pushState(null,"",location.href.split("?")[0]),a().initializers.add("auth-popup-failsafe",(function(){(0,o.extend)(i().prototype,"mount",(function(){var e=this;u&&setTimeout((function(){e.authenticationComplete(JSON.parse(u))}),200)}))}))})(),module.exports=t})();
//# sourceMappingURL=forum.js.map