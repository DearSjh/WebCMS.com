webpackJsonp([18],{AR6o:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0}),e.default={name:"ckeditor",data:function(){return{EditorObj:null}},mounted:function(){this.initCKEditor()},methods:{initCKEditor:function(){var t=this;DecoupledEditor.create(document.querySelector(".document-editor__editable"),{ckfinder:{uploadUrl:"/api/img-api/upload"}}).then(function(e){document.querySelector(".document-editor__toolbar").appendChild(e.ui.view.toolbar.element),t.EditorObj=e}).catch(function(t){console.error(t)})}}}},BPj4:function(t,e){},EDMY:function(t,e,i){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var n=i("AR6o"),o=i.n(n);for(var r in n)"default"!==r&&function(t){i.d(e,t,function(){return n[t]})}(r);var u=i("quWk");var c=function(t){i("BPj4")},d=i("C7Lr")(o.a,u.a,!1,c,null,null);e.default=d.exports},quWk:function(t,e,i){"use strict";var n={render:function(){this.$createElement;this._self._c;return this._m(0)},staticRenderFns:[function(){var t=this.$createElement,e=this._self._c||t;return e("div",{staticClass:"document-editor"},[e("div",{staticClass:"document-editor__toolbar"}),this._v(" "),e("div",{staticClass:"document-editor__editable-container"},[e("div",{staticClass:"document-editor__editable"},[e("p",[this._v("CSDN同款富文本编辑器，支持将截图直接粘贴进来")])])])])}]};e.a=n}});