webpackJsonp([13],{DtL7:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=a("l4+X"),s=a.n(i);for(var r in i)"default"!==r&&function(e){a.d(t,e,function(){return i[e]})}(r);var n=a("g50z");var o=function(e){a("YrAh")},c=a("C7Lr")(s.a,n.a,!1,o,null,null);t.default=c.exports},YrAh:function(e,t){},g50z:function(e,t,a){"use strict";var i={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"contain"},[a("h2",{staticClass:"title"},[e._v("建议留言页")]),e._v(" "),a("el-form",{staticClass:"outer",attrs:{model:e.mayiForm,inline:!0}},[a("el-form-item",{staticClass:"text"},[a("el-input",{attrs:{placeholder:"请留下你的留言吧~"},model:{value:e.mayiForm.code,callback:function(t){e.$set(e.mayiForm,"code",t)},expression:"mayiForm.code"}})],1),e._v(" "),a("el-form-item",{staticClass:"btn"},[a("el-button",{attrs:{type:"primary"},on:{click:e.add}},[e._v("添加")])],1)],1),e._v(" "),a("el-button",{staticStyle:{width:"100%"},attrs:{type:"warning"},on:{click:e.fresh}},[e._v("刷新")]),e._v(" "),a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],staticStyle:{width:"100%"},attrs:{data:e.tableData,border:"","row-class-name":e.tableRowClassName}},[a("el-table-column",{attrs:{prop:"city",label:"城市","min-width":"25"}}),e._v(" "),a("el-table-column",{attrs:{prop:"code",label:"建议留言"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",{staticClass:"copytext",attrs:{id:"code_"+t.$index}},[e._v(e._s(t.row.code))]),e._v(" "),a("span",[e._v(" "+e._s(e.getCode(t.row.code)))])]}}])}),e._v(" "),a("el-table-column",{attrs:{prop:"updatetime",label:"时间",formatter:this.$common.timestampToTime,"min-width":"25"}})],1)],1)},staticRenderFns:[]};t.a=i},"l4+X":function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i,s=a("qzrg"),r=(i=s)&&i.__esModule?i:{default:i};t.default={name:"msg",data:function(){return{listLoading:!1,mayiForm:{code:""},errorInfo:{text:"登陆失败,请重试",isShowError:!1},tableData:[{id:"1",createtime:"2016-05-02",city:"广东",code:"#吱口令#长按复制此条消息，打开支付宝即可添加我为好友FMSj7Z97hO",ip:""},{id:"2",createtime:"2016-05-04",city:"北京",code:"#吱口令#长按复制此条消息，打开支付宝即可添加我为好友DV4j8Y36Us",ip:""}]}},mounted:function(){var e=this;this.fresh();var t={ip:returnCitySN.cip,city:returnCitySN.cname+"-建议留言页"};r.default.shiroApi.loginLog(t),new Clipboard("#copy_btn").on("success",function(t){t.clearSelection(),e.$message({type:"success",message:"复制成功!"})})},computed:{getCode:function(){return function(e){return e.replace("长按","").replace("此条消息","").replace("即可","").replace("我为","")}}},methods:{enable:function(e){return e.row.ip!=returnCitySN.cip},add:function(){var e=this;if(""!=this.mayiForm.code){var t={ip:returnCitySN.cip,city:returnCitySN.cname,code:this.mayiForm.code};r.default.mayiApi.add(t).then(function(t){t&&t.data&&("SUCCESS"==t.data.status?(e.$message({type:"success",message:"添加成功!"}),e.mayiForm.code="",e.fresh()):(e.$message({type:"error",message:"添加失败!"}),e.fresh()))}).catch(function(t){e.$message({type:"error",message:"添加失败!"}),e.fresh()})}else this.$message({type:"success",message:"哨口令不能为空!"})},fresh:function(){var e=this;this.listLoading=!0;var t={ip:returnCitySN.cip,currentPage:0,pageSize:100};r.default.mayiApi.getList(t).then(function(t){if(e.listLoading=!1,t&&t.data){var a=t.data;if("SUCCESS"==a.status){var i=a.data;e.tableData=i,e.$message({type:"success",message:"刷新成功!"})}else e.$message({type:"error",message:a.message})}}).catch(function(t){e.listLoading=!1,e.$message({type:"error",message:"刷新失败请重试!"})})},copy:function(e,t){var a=this,i={ip:returnCitySN.cip,addid:t.id};r.default.mayiApi.copy(i).then(function(e){e&&e.data&&("SUCCESS"==e.data.status?(console.log("复制成功"),a.fresh()):console.log("复制失败"))}).catch(function(e){var t={ip:returnCitySN.cip,city:returnCitySN.cname+"-蚂蚁种树复制异常"};r.default.shiroApi.loginLog(t)})},tableRowClassName:function(e){var t=e.row,a=e.rowIndex;return t.ip==returnCitySN.cip?"success-row":a%2==0?"warning-row":""}}}}});