webpackJsonp([8],{"/92L":function(t,e,a){"use strict";var i={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("section",[a("div",{staticClass:"table"},[a("div",{staticClass:"crumbs"},[a("el-breadcrumb",{attrs:{separator:"/"}},[a("el-breadcrumb-item",[a("i",{staticClass:"el-icon-tickets"}),t._v("自定义数据管理")])],1)],1),t._v(" "),a("div",{staticClass:"container"},[a("el-button",{attrs:{type:"success",icon:"el-icon-circle-plus-outline",size:"mini",round:""},on:{click:t.handleAdd}},[t._v("新增")]),t._v(" "),a("el-button",{attrs:{type:"danger",icon:"el-icon-delete",size:"mini",round:""},on:{click:t.handleDeleteList}},[t._v("删除")]),t._v(" "),[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.listLoading,expression:"listLoading"}],ref:"multipleTable",staticClass:"el-tb-edit mgt20",attrs:{data:t.tableData,size:"mini","highlight-current-row":"",border:"","tooltip-effect":"dark"},on:{"selection-change":t.selectChange}},[a("el-table-column",{attrs:{type:"selection",width:"55"}}),t._v(" "),a("el-table-column",{attrs:{prop:"id",label:"ID"}}),t._v(" "),a("el-table-column",{attrs:{prop:"name",label:"标识名称"}}),t._v(" "),a("el-table-column",{attrs:{prop:"updated_at",label:"更新时间"}}),t._v(" "),a("el-table-column",{attrs:{fixed:"right",label:"操作",width:"150"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"primary",plain:"",size:"small"},on:{click:function(a){t.handleEdit(e.$index,e.row)}}},[t._v("修改")]),t._v(" "),a("el-button",{attrs:{size:"small",type:"danger"},on:{click:function(a){t.handleDelete(e.$index,e.row)}}},[t._v("删除")])]}}])})],1)],t._v(" "),a("br"),t._v(" "),a("br"),t._v(" "),a("el-pagination",{attrs:{"current-page":t.currentPage,"page-sizes":[10,50,100,200],"page-size":t.perPage,layout:"total, sizes, prev, pager, next, jumper",total:t.total},on:{"size-change":t.handleSizeChange,"current-change":t.handleCurrentChange}})],2)]),t._v(" "),a("el-dialog",{attrs:{title:"新增",visible:t.addFormVisible,"close-on-click-modal":!1},on:{"update:visible":function(e){t.addFormVisible=e}}},[a("el-form",{ref:"addForm",attrs:{inline:!0,model:t.addForm,"label-width":"80px"}},[a("div",{staticStyle:{"text-align":"center"}},[a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em",[t._v("*")]),t._v("标识名称")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.custom_name,expression:"addForm.custom_name"}],staticClass:"custom_name el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.custom_name},on:{input:function(e){e.target.composing||t.$set(t.addForm,"custom_name",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em",[t._v("*")]),t._v("详细内容")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.custom_content,expression:"addForm.custom_content"}],staticClass:"custom_content el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.custom_content},on:{input:function(e){e.target.composing||t.$set(t.addForm,"custom_content",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em"),t._v("跳转链接")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.custom_link,expression:"addForm.custom_link"}],staticClass:"custom_link el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.custom_link},on:{input:function(e){e.target.composing||t.$set(t.addForm,"custom_link",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em",[t._v("*")]),t._v("开启状态")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-radio",{attrs:{label:"1"},model:{value:t.addForm.state,callback:function(e){t.$set(t.addForm,"state",e)},expression:"addForm.state"}},[t._v("开启")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.addForm.state,callback:function(e){t.$set(t.addForm,"state",e)},expression:"addForm.state"}},[t._v("关闭")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em"),t._v("图片")])]),t._v(" "),a("dd",{staticStyle:{width:"355px"}},[a("el-upload",{attrs:{action:"//cms.com/admin/uploadImage","list-type":"picture","on-preview":t.handlePictureCardPreview,"on-remove":t.handleRemove,"on-success":t.success}},[a("div",{staticStyle:{display:"flex"}},[a("input",{staticClass:"el-input__inner",staticStyle:{width:"300px"},attrs:{placeholder:"图片上传",name:"address",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"}},[t._v("点击上传")])],1)]),t._v(" "),a("el-dialog",{attrs:{visible:t.dialogImg},on:{"update:visible":function(e){t.dialogImg=e}}},[a("img",{attrs:{width:"100%",src:t.dialogImageUrl,alt:""}})])],1)])])]),t._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.addFormVisible=!1}}},[t._v("取消")]),t._v(" "),a("el-button",{attrs:{type:"primary",loading:t.addLoading},on:{click:t.addSubmit}},[t._v("提交")])],1)],1),t._v(" "),a("el-dialog",{attrs:{title:"编辑",visible:t.editFormVisible,"close-on-click-modal":!1},on:{"update:visible":function(e){t.editFormVisible=e}}},[a("el-form",{ref:"editForm",attrs:{inline:!0,model:t.editForm,"label-width":"80px"}},[a("div",{staticStyle:{"text-align":"center"}},[a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em",[t._v("*")]),t._v("标识名称")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.custom_name,expression:"editForm.custom_name"}],staticClass:"custom_name el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.custom_name},on:{input:function(e){e.target.composing||t.$set(t.editForm,"custom_name",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em",[t._v("*")]),t._v("详细内容")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.custom_content,expression:"editForm.custom_content"}],staticClass:"custom_content el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.custom_content},on:{input:function(e){e.target.composing||t.$set(t.editForm,"custom_content",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em"),t._v("跳转链接")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.custom_link,expression:"editForm.custom_link"}],staticClass:"custom_link el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.custom_link},on:{input:function(e){e.target.composing||t.$set(t.editForm,"custom_link",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em",[t._v("*")]),t._v("开启状态")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-radio",{attrs:{label:"1"},model:{value:t.editForm.state,callback:function(e){t.$set(t.editForm,"state",e)},expression:"editForm.state"}},[t._v("开启")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.editForm.state,callback:function(e){t.$set(t.editForm,"state",e)},expression:"editForm.state"}},[t._v("关闭")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"150px"}},[a("label",[a("em"),t._v("图片")])]),t._v(" "),a("dd",{staticStyle:{width:"355px"}},[a("el-upload",{attrs:{action:"//cms.com/admin/uploadImage","list-type":"picture","on-preview":t.handlePictureCardPreview,"on-remove":t.handleRemove,"on-success":t.success}},[a("div",{staticStyle:{display:"flex"}},[a("input",{staticClass:"el-input__inner",staticStyle:{width:"300px"},attrs:{placeholder:"图片上传",name:"address",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.img_show}},[t._v("点击上传")])],1)]),t._v(" "),t.editForm.img?a("div",{staticClass:"imgshow"},[a("img",{staticStyle:{width:"70px",height:"70px","line-height":"70px",margin:"auto 0px"},attrs:{src:t.editForm.img,alt:""}}),t._v(" "),t.editForm.img?a("div",{staticStyle:{margin:"auto 0px"}},[t._v(t._s(t.editForm.img_name))]):t._e()]):t._e(),t._v(" "),a("el-dialog",{attrs:{visible:t.dialogImg},on:{"update:visible":function(e){t.dialogImg=e}}},[a("img",{attrs:{width:"100%",src:t.dialogImageUrl,alt:""}})])],1)])])]),t._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.editFormVisible=!1}}},[t._v("取消")]),t._v(" "),a("el-button",{attrs:{type:"primary",loading:t.editLoading},on:{click:t.editSubmit}},[t._v("提交")])],1)],1)],1)},staticRenderFns:[]};e.a=i},L382:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("SIIW"),s=a.n(i);for(var o in i)"default"!==o&&function(t){a.d(e,t,function(){return i[t]})}(o);var l=a("/92L");var n=function(t){a("aWeY")},d=a("VU/8")(s.a,l.a,!1,n,"data-v-110e5d89",null);e.default=d.exports},SIIW:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i,s=a("qzrg"),o=(i=s)&&i.__esModule?i:{default:i};e.default={name:"webInfo",data:function(){return{visible:!1,dialogVisible:!1,dialogImageUrl:"",dialogImg:!1,disabled:!1,custom_img:"",tableData:[],listLoading:!1,selectList:[],perPage:10,currentPage:1,total:0,addFormVisible:!1,addLoading:!1,addForm:{custom_name:"",custom_link:"",custom_content:"",state:"1"},editFormVisible:!1,editLoading:!1,editForm:{custom_name:"",custom_link:"",custom_content:"",state:"",img:"",img_name:""}}},methods:{handleCurrentChange:function(t){this.currentPage=t,this.getResult()},handleSizeChange:function(t){this.perPage=t,this.getResult()},handleRemove:function(t,e){},handlePictureCardPreview:function(t){this.dialogImageUrl=t.url,this.dialogImg=!0},success:function(t,e,a){this.custom_img=t.data.newFileDir},getResult:function(){var t=this,e=this.perPage,a=this.currentPage;o.default.cmsApi.customList(e,a).then(function(e){200!==e.data.code?alert(e.data.message):(t.tableData=e.data.data.data,t.total=e.data.data.pagination.total,$(".el-upload-list__item").hide())}).catch(function(t){})},handleAdd:function(){this.addFormVisible=!0},addSubmit:function(){var t=this,e={picture:this.custom_img,name:this.addForm.custom_name,link:this.addForm.custom_link,state:this.addForm.state,content:this.addForm.custom_content};o.default.cmsApi.customAdd(e).then(function(e){200==e.data.code?swal(e.data.message+"!","","success").then(function(e){t.getResult(),t.addFormVisible=!1}):swal(e.data.message+"!","","")}).catch(function(t){})},img_show:function(){this.editForm.img=""},handleEdit:function(t,e){var a=this;this.editFormVisible=!0,o.default.cmsApi.customDetails(e.id).then(function(t){200==t.data.code?(a.editForm.custom_name=t.data.data.name,a.editForm.custom_link=t.data.data.link,a.editForm.custom_content=t.data.data.content,a.editForm.state=t.data.data.state.toString(),window.custom_modify_submit_id=t.data.data.id,a.editForm.img="//cms.com"+t.data.data.picture,a.editForm.img_name=t.data.data.picture.match(/\/(\w+\.(?:png|jpg|gif|bmp))$/i)[1]):swal(t.data.message+"!","","")}).catch(function(t){})},editSubmit:function(){var t=this,e={name:this.editForm.custom_name,picture:this.custom_img,link:this.editForm.custom_link,state:this.editForm.state,content:this.editForm.custom_content};o.default.cmsApi.customEdit(custom_modify_submit_id,e).then(function(e){200==e.data.code?(t.editFormVisible=!1,swal(e.data.message+"!","","success").then(function(e){t.getResult()})):swal(e.data.message+"!","","")}).catch(function(t){})},selectChange:function(t){this.selectList=t},handleDelete:function(t,e){var a=this,i=new Array;i.push(e.id),this.$confirm("确认删除该记录吗?","提示",{type:"warning"}).then(function(){a.listLoading=!0,a.$ajax({method:"post",url:"//cms.com/admin/banner/del",data:{ids:i},type:"json"}).then(function(t){a.listLoading=!1,a.$message({message:"删除成功",type:"success"}),a.selectList=[],a.getResult()})}).catch(function(){})},handleDeleteList:function(){for(var t=this,e=this.selectList.length,a="",i=0;i<e;i++)a+=this.selectList[i].id+",";a=a.substring(0,a.length-1);var s=new Array;s.push(a),this.$confirm("确认删除该记录吗?","提示",{type:"warning"}).then(function(){t.listLoading=!0,t.$ajax({method:"post",url:"//cms.com/admin/banner/del",data:{ids:s}}).then(function(e){t.listLoading=!1,t.$message({message:"删除成功",type:"success"}),t.selectList=[],t.getResult()})}).catch(function(){})}},mounted:function(){this.getResult()}}},aWeY:function(t,e){}});