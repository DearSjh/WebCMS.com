webpackJsonp([12],{"+XoU":function(t,e,a){"use strict";var i={render:function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("section",[a("div",{staticClass:"table"},[a("div",{staticClass:"crumbs"},[a("el-breadcrumb",{attrs:{separator:"/"}},[a("el-breadcrumb-item",[a("i",{staticClass:"el-icon-tickets"}),t._v("内容管理")])],1)],1),t._v(" "),a("div",{staticClass:"container"},[a("div",{staticStyle:{display:"flex","justify-content":"space-between"}},[a("div",{staticStyle:{"margin-right":"20px",color:"#606266"}},[t._v("\n          栏目：\n          "),a("el-cascader",{attrs:{options:t.options,props:{checkStrictly:!0},clearable:""},on:{change:t.disappear},model:{value:t.categoryId,callback:function(e){t.categoryId=e},expression:"categoryId"}}),t._v("\n\n          标题：\n          "),a("el-input",{staticStyle:{width:"300px"},attrs:{placeholder:"请输入内容",clearable:""},model:{value:t.input,callback:function(e){t.input=e},expression:"input"}}),t._v(" "),a("el-button",{attrs:{icon:"el-icon-circle-plus-outline",round:"",size:"mini",type:"primary"},on:{click:t.getResult}},[t._v("查询")])],1),t._v(" "),a("div",{staticStyle:{margin:"auto 0px"}},[a("el-button",{attrs:{icon:"el-icon-circle-plus-outline",round:"",size:"mini",type:"success"},on:{click:t.handleAdd}},[t._v("新增")]),t._v(" "),a("el-button",{attrs:{icon:"el-icon-delete",round:"",size:"mini",type:"danger"},on:{click:t.handleDeleteList}},[t._v("删除")])],1)]),t._v(" "),[a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.listLoading,expression:"listLoading"}],ref:"multipleTable",staticClass:"el-tb-edit mgt20",attrs:{data:t.tableData,size:"mini","highlight-current-row":"",border:"","tooltip-effect":"dark"},on:{"selection-change":t.selectChange}},[a("el-table-column",{attrs:{type:"selection",width:"55"}}),t._v(" "),a("el-table-column",{attrs:{prop:"id",label:"ID"}}),t._v(" "),a("el-table-column",{attrs:{prop:"title",label:"标题"}}),t._v(" "),a("el-table-column",{attrs:{prop:"category",label:"栏目"}}),t._v(" "),a("el-table-column",{attrs:{prop:"type",label:"栏目类型"}}),t._v(" "),a("el-table-column",{attrs:{prop:"updated_at",label:"更新时间"}}),t._v(" "),a("el-table-column",{attrs:{prop:"visits",label:"点击"}}),t._v(" "),a("el-table-column",{attrs:{label:"发布状态",prop:""},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-switch",{staticClass:"demo",attrs:{"active-value":1,"inactive-value":0,"active-color":"#13ce66","inactive-color":"#ff4949","active-text":"开","inactive-text":"关"},on:{change:function(a){t.stateSwitch(e.row)}},model:{value:e.row.state,callback:function(a){t.$set(e.row,"state",a)},expression:"scope.row.state"}})]}}])}),t._v(" "),a("el-table-column",{attrs:{fixed:"right",label:"操作",width:"150"},scopedSlots:t._u([{key:"default",fn:function(e){return[a("el-button",{attrs:{type:"primary",plain:"",size:"small"},on:{click:function(a){t.handleEdit(e.$index,e.row)}}},[t._v("修改")]),t._v(" "),a("el-button",{attrs:{size:"small",type:"danger"},on:{click:function(a){t.handleDelete(e.$index,e.row)}}},[t._v("删除")])]}}])})],1)],t._v(" "),a("br"),t._v(" "),a("br"),t._v(" "),a("el-pagination",{attrs:{"current-page":t.currentPage,"page-sizes":[10,50,100,200],"page-size":t.perPage,layout:"total, sizes, prev, pager, next, jumper",total:t.total},on:{"size-change":t.handleSizeChange,"current-change":t.handleCurrentChange}})],2)]),t._v(" "),a("el-dialog",{attrs:{"close-on-click-modal":!1,visible:t.addFormVisible,title:"新增"},on:{"update:visible":function(e){t.addFormVisible=e}}},[a("el-form",{ref:"addForm",attrs:{inline:!0,model:t.addForm,"label-width":"80px"}},[a("div",[a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em",[t._v("*")]),t._v("栏目")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-cascader",{staticStyle:{width:"600px"},attrs:{options:t.options,props:{checkStrictly:!0},clearable:""},on:{change:t.disappear},model:{value:t.addForm.category_id,callback:function(e){t.$set(t.addForm,"category_id",e)},expression:"addForm.category_id"}})],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em",[t._v("*")]),t._v("文章标题")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.title,expression:"addForm.title"}],staticClass:"column_belongs el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.title},on:{input:function(e){e.target.composing||t.$set(t.addForm,"title",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("文章来源")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.source,expression:"addForm.source"}],staticClass:"column_type el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.source},on:{input:function(e){e.target.composing||t.$set(t.addForm,"source",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("跳转链接")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.link,expression:"addForm.link"}],staticClass:"directory_name el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.link},on:{input:function(e){e.target.composing||t.$set(t.addForm,"link",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("关键词")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.column_link,expression:"addForm.column_link"}],staticClass:"column_link el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.column_link},on:{input:function(e){e.target.composing||t.$set(t.addForm,"column_link",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("排序")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.column_sorting,expression:"addForm.column_sorting"}],staticClass:"column_sorting el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.column_sorting},on:{input:function(e){e.target.composing||t.$set(t.addForm,"column_sorting",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("点击次数")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.visits,expression:"addForm.visits"}],staticClass:"column_sorting el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.visits},on:{input:function(e){e.target.composing||t.$set(t.addForm,"visits",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("置顶")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.addForm.top,callback:function(e){t.$set(t.addForm,"top",e)},expression:"addForm.top"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.addForm.top,callback:function(e){t.$set(t.addForm,"top",e)},expression:"addForm.top"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("推荐")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.addForm.recommended,callback:function(e){t.$set(t.addForm,"recommended",e)},expression:"addForm.recommended"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.addForm.recommended,callback:function(e){t.$set(t.addForm,"recommended",e)},expression:"addForm.recommended"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("滚动")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.addForm.rolling,callback:function(e){t.$set(t.addForm,"rolling",e)},expression:"addForm.rolling"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.addForm.rolling,callback:function(e){t.$set(t.addForm,"rolling",e)},expression:"addForm.rolling"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("是否发布")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.addForm.state,callback:function(e){t.$set(t.addForm,"state",e)},expression:"addForm.state"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.addForm.state,callback:function(e){t.$set(t.addForm,"state",e)},expression:"addForm.state"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("发布时间")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-date-picker",{attrs:{type:"datetime",placeholder:"选择日期时间"},model:{value:t.addForm.time_value,callback:function(e){t.$set(t.addForm,"time_value",e)},expression:"addForm.time_value"}})],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("缩略图")])]),t._v(" "),a("dd",[a("el-upload",{attrs:{action:"/admin/uploadImage","list-type":"picture",limit:1,"file-list":t.addForm.img_fileList,"on-exceed":t.handleExceed,"on-success":t.success}},[a("div",{staticStyle:{display:"flex",width:"600px"}},[a("input",{staticClass:"el-input__inner",attrs:{placeholder:"图片上传",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"}},[t._v("点击上传")])],1)])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("图片集")])]),t._v(" "),a("dd",[a("el-upload",{attrs:{action:"/admin/uploadImage","list-type":"picture","file-list":t.addForm.group_img_fileList,"on-success":t.groupSuccess}},[a("div",{staticStyle:{display:"flex",width:"600px"}},[a("input",{staticClass:"el-input__inner",attrs:{placeholder:"图片上传",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"}},[t._v("点击上传")])],1)])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("摘要")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.addForm.abstract,expression:"addForm.abstract"}],staticClass:"column_SEO el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.addForm.abstract},on:{input:function(e){e.target.composing||t.$set(t.addForm,"abstract",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("文件上传")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-upload",{attrs:{action:"/admin/uploadImage","before-remove":t.file_beforeRemove,"on-exceed":t.file_handleExceed,multiple:"",data:t.uploadData,limit:1,"file-list":t.addForm.fileList}},[a("div",{staticStyle:{display:"flex",width:"600px"}},[a("input",{staticClass:"el-input__inner",attrs:{placeholder:"文件上传",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"}},[t._v("点击上传")])],1)])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"100px"}},[a("label",[a("em"),t._v("详细内容")])]),t._v(" "),a("dd",{staticStyle:{width:"700px"}},[a("vue-ueditor-wrap",{attrs:{config:t.myConfig},model:{value:t.addForm.content,callback:function(e){t.$set(t.addForm,"content",e)},expression:"addForm.content"}})],1)])])]),t._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.addFormVisible=!1}}},[t._v("取消")]),t._v(" "),a("el-button",{attrs:{loading:t.addLoading,type:"primary"},on:{click:t.addSubmit}},[t._v("提交")])],1)],1),t._v(" "),a("el-dialog",{attrs:{"close-on-click-modal":!1,visible:t.editFormVisible,title:"编辑"},on:{"update:visible":function(e){t.editFormVisible=e}}},[a("el-form",{ref:"editForm",attrs:{inline:!0,model:t.editForm,"label-width":"80px"}},[a("div",[a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em",[t._v("*")]),t._v("栏目")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-cascader",{staticStyle:{width:"600px"},attrs:{options:t.options,props:{checkStrictly:!0},clearable:""},on:{change:t.disappear},model:{value:t.editForm.category_id,callback:function(e){t.$set(t.editForm,"category_id",e)},expression:"editForm.category_id"}})],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em",[t._v("*")]),t._v("文章标题")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.title,expression:"editForm.title"}],staticClass:"column_belongs el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.title},on:{input:function(e){e.target.composing||t.$set(t.editForm,"title",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("文章来源")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.source,expression:"editForm.source"}],staticClass:"column_type el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.source},on:{input:function(e){e.target.composing||t.$set(t.editForm,"source",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("跳转链接")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.link,expression:"editForm.link"}],staticClass:"directory_name el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.link},on:{input:function(e){e.target.composing||t.$set(t.editForm,"link",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("关键词")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.column_link,expression:"editForm.column_link"}],staticClass:"column_link el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.column_link},on:{input:function(e){e.target.composing||t.$set(t.editForm,"column_link",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("排序")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.column_sorting,expression:"editForm.column_sorting"}],staticClass:"column_sorting el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.column_sorting},on:{input:function(e){e.target.composing||t.$set(t.editForm,"column_sorting",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("点击次数")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.visits,expression:"editForm.visits"}],staticClass:"column_sorting el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.visits},on:{input:function(e){e.target.composing||t.$set(t.editForm,"visits",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("置顶")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.editForm.top,callback:function(e){t.$set(t.editForm,"top",e)},expression:"editForm.top"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.editForm.top,callback:function(e){t.$set(t.editForm,"top",e)},expression:"editForm.top"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("推荐")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.editForm.recommended,callback:function(e){t.$set(t.editForm,"recommended",e)},expression:"editForm.recommended"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.editForm.recommended,callback:function(e){t.$set(t.editForm,"recommended",e)},expression:"editForm.recommended"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("滚动")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.editForm.rolling,callback:function(e){t.$set(t.editForm,"rolling",e)},expression:"editForm.rolling"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.editForm.rolling,callback:function(e){t.$set(t.editForm,"rolling",e)},expression:"editForm.rolling"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"130px"}},[a("label",[a("em"),t._v("是否发布")])]),t._v(" "),a("dd",{staticClass:"opt",staticStyle:{height:"30px"}},[a("el-radio",{attrs:{label:"1"},model:{value:t.editForm.state,callback:function(e){t.$set(t.editForm,"state",e)},expression:"editForm.state"}},[t._v("是")]),t._v(" "),a("el-radio",{attrs:{label:"0"},model:{value:t.editForm.state,callback:function(e){t.$set(t.editForm,"state",e)},expression:"editForm.state"}},[t._v("否")])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("发布时间")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-date-picker",{attrs:{type:"datetime",placeholder:"选择日期时间"},model:{value:t.editForm.time_value,callback:function(e){t.$set(t.editForm,"time_value",e)},expression:"editForm.time_value"}})],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("缩略图")])]),t._v(" "),a("dd",[a("el-upload",{attrs:{action:"/admin/uploadImage","list-type":"picture",limit:1,"on-exceed":t.handleExceed,"on-success":t.success}},[a("div",{staticStyle:{display:"flex",width:"600px"}},[a("input",{staticClass:"el-input__inner",attrs:{placeholder:"图片上传",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.img_show}},[t._v("点击上传")])],1)]),t._v(" "),t.editForm.img?a("div",{staticClass:"imgshow"},[a("img",{staticStyle:{height:"70px","line-height":"70px",margin:"auto 0px","max-width":"260px"},attrs:{src:t.editForm.img,alt:""}}),t._v(" "),a("div",{staticStyle:{margin:"auto 0px"}},[t._v(t._s(t.editForm.img_name))])]):t._e()],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("图片集")])]),t._v(" "),a("dd",[a("el-upload",{attrs:{action:"/admin/uploadImage","list-type":"picture","on-success":t.groupSuccess}},[a("div",{staticStyle:{display:"flex",width:"600px"}},[a("input",{staticClass:"el-input__inner",attrs:{placeholder:"图片集上传",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"}},[t._v("点击上传")])],1)]),t._v(" "),a("div",{staticStyle:{display:"flex","flex-wrap":"wrap",width:"600px"}},t._l(t.editForm.img_atlas_data,function(e){return t.editForm.img_atlas?a("div",{staticClass:"imgshow"},[a("img",{staticStyle:{height:"70px","line-height":"70px",margin:"auto 0px","max-width":"260px"},attrs:{src:e,alt:""}}),t._v(" "),a("i",{staticClass:"el-icon-close",staticStyle:{"margin-top":"10px","margin-right":"-40px","font-size":"20px"},on:{click:function(e){t.imgDelete(e)}}})]):t._e()}))],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("摘要")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.editForm.abstract,expression:"editForm.abstract"}],staticClass:"column_SEO el-input__inner",attrs:{type:"text",value:""},domProps:{value:t.editForm.abstract},on:{input:function(e){e.target.composing||t.$set(t.editForm,"abstract",e.target.value)}}})])]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticClass:"rows-text"},[a("label",[a("em"),t._v("文件上传")])]),t._v(" "),a("dd",{staticClass:"opt"},[a("el-upload",{attrs:{action:"/admin/uploadImage","before-remove":t.file_beforeRemove,"on-exceed":t.file_handleExceed,"on-success":t.file_success,multiple:"",data:t.uploadData,limit:1,"file-list":t.editForm.fileList}},[a("div",{staticStyle:{display:"flex",width:"600px"}},[a("input",{staticClass:"el-input__inner",attrs:{placeholder:"文件上传",type:"text"}}),t._v(" "),a("el-button",{attrs:{size:"small",type:"primary"},on:{click:t.empty}},[t._v("点击上传")])],1)])],1)]),t._v(" "),a("dl",{staticClass:"rows"},[a("dt",{staticStyle:{"text-align":"left",width:"100px"}},[a("label",[a("em"),t._v("详细内容")])]),t._v(" "),a("dd",{staticStyle:{width:"700px"}},[a("vue-ueditor-wrap",{attrs:{config:t.myConfig},model:{value:t.editForm.content,callback:function(e){t.$set(t.editForm,"content",e)},expression:"editForm.content"}})],1)])])]),t._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(e){t.editFormVisible=!1}}},[t._v("取消")]),t._v(" "),a("el-button",{attrs:{loading:t.editLoading,type:"primary"},on:{click:t.editSubmit}},[t._v("提交")])],1)],1)],1)},staticRenderFns:[]};e.a=i},Vvfw:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=l(a("qzrg")),s=l(a("Pgpu"));function l(t){return t&&t.__esModule?t:{default:t}}e.default={name:"",components:{VueUeditorWrap:s.default},data:function(){return{uploadData:{folder:"download"},categoryId:"",input:"",myConfig:{initialFrameWidth:"100%",serverUrl:"/admin/updateFile?action=config",UEDITOR_HOME_URL:"/admin/static/UEditor/"},main_pic:"",file_path:"",options:[],tableData:[],listLoading:!1,selectList:[],perPage:10,currentPage:1,total:0,addFormVisible:!1,addLoading:!1,addForm:{category_id:"",title:"",source:"",link:"",keyword:"",abstract:"",top:"0",recommended:"0",rolling:"0",state:"0",sort:"",visits:"",content:'<h2><img src="http://img.baidu.com/hi/jx2/j_0003.gif"/> UEditor </h2>',fileList:[],img_fileList:[],group_img_fileList:[],time_value:"",release_time:""},editFormVisible:!1,editLoading:!1,editForm:{img:"",img_name:"",img_atlas:!0,img_atlas_data:[],category_id:"",title:"",source:"",link:"",keyword:"",abstract:"",top:"1",recommended:"1",rolling:"1",state:"1",sort:"",visits:"",content:'<h2><img src="http://img.baidu.com/hi/jx2/j_0003.gif"/> UEditor </h2>',fileList:[],time_value:"",release_time:""}}},methods:{disappear:function(){$(".el-popper").hide(),console.log(this.editForm.category_id)},file_success:function(t,e,a){this.file_path=t.data.newFileDir},file_beforeRemove:function(t,e){return this.$confirm("确定移除 "+t.name+"？")},file_handleExceed:function(t,e){this.$message.warning("当前限制选择 1 个文件，本次选择了 "+t.length+" 个文件，共选择了 "+t.length+" 个文件")},handleCurrentChange:function(t){this.currentPage=t,this.getResult()},handleSizeChange:function(t){this.perPage=t,this.getResult()},handleExceed:function(t,e){this.$message.warning("当前限制选择 1 个图片，本次选择了 "+t.length+" 个图片，共选择了 "+t.length+" 个图片")},success:function(t,e,a){this.main_pic=t.data.newFileDir},atlas:function(t){window.group_pic=new Array},groupSuccess:function(t,e,a){group_pic.push(t.data.newFileDir)},imgDelete:function(t){var e=t.currentTarget.previousElementSibling.src.replace(/http[s]?:\/\/[^\/]+/,""),a=this.editForm.img_atlas_data,i=a.indexOf(e);i>-1&&a.splice(i,1),window.group_pic=a},stateSwitch:function(t){var e=this;if(1==t.state)var a=1;if(0==t.state)a=0;this.$ajax({method:"get",url:"/admin/article/open/"+t.id,type:"json",params:{state:a}}).then(function(t){e.listLoading=!1,e.getResult()})},list:function(){var t=this;i.default.cmsApi.categoryValue({}).then(function(e){t.options=e.data.data.data}).catch(function(t){})},getResult:function(){var t=this;if(0!==this.categoryId.length&&""!==this.categoryId)var e=this.categoryId.pop();else e="";var a=this.perPage,s=this.currentPage,l=(e=e,this.input);i.default.cmsApi.articleList(e,l,a,s).then(function(e){200!==e.data.code?alert(e.data.message):(t.tableData=e.data.data.data,t.total=e.data.data.pagination.total,$(".el-upload-list__item").hide())}).catch(function(t){})},handleAdd:function(){this.addFormVisible=!0},addSubmit:function(){var t=this;if(0!==this.addForm.category_id.length&&""!==this.addForm.category_id)var e=this.addForm.category_id.pop();else e="";function a(t){return t<10?"0"+t:t}if(""!==this.addForm.time_value&&0!==this.addForm.time_value&&null!==this.addForm.time_value&&void 0!==this.editForm.time_value){var s=this.addForm.time_value,l=s.getFullYear()+"-"+a(s.getMonth()+1)+"-"+a(s.getDate()),o=a(s.getHours())+":"+a(s.getMinutes())+":"+a(s.getSeconds());this.addForm.release_time=l+" "+o}var d={category_id:e,release_time:this.addForm.release_time,file_path:this.file_path,title:this.addForm.title,source:this.addForm.source,main_pic:this.main_pic,group_pic:group_pic,link:this.addForm.link,keyword:this.addForm.keyword,abstract:this.addForm.abstract,top:this.addForm.top,recommended:this.addForm.recommended,rolling:this.addForm.rolling,state:this.addForm.state,sort:this.addForm.sort,visits:this.addForm.visits,content:this.addForm.content};i.default.cmsApi.articleAdd(d).then(function(e){200==e.data.code?swal(e.data.message+"!","","success").then(function(e){t.addFormVisible=!1,t.getResult(),t.list(),t.addForm.release_time="",t.addForm.fileList=[],t.addForm.title="",t.addForm.source="",t.addForm.img_fileList=[],t.addForm.group_img_fileList=[],t.addForm.link="",t.addForm.keyword="",t.addForm.abstract="",t.addForm.sort="",t.addForm.visits="",t.addForm.content=""}):swal(e.data.message+"!","","")}).catch(function(t){})},empty:function(){this.editForm.fileList=[]},img_show:function(){this.editForm.img=""},parserDate:function(t){var e=Date.parse(t);if(!isNaN(e))return new Date(Date.parse(t.replace(/-/g,"/")))},handleEdit:function(t,e){var a=this;this.editForm.img_atlas=!0,this.editFormVisible=!0,i.default.cmsApi.articleDetails(e.id).then(function(t){200==t.data.code?(""!==t.data.data.file_path&&null!==t.data.data.file_path?a.editForm.fileList=[{name:t.data.data.file_path}]:a.editForm.fileList=[],a.editForm.time_value=a.parserDate(t.data.data.release_time),a.editForm.category_id=t.data.data.category_id,a.editForm.title=t.data.data.title,a.editForm.source=t.data.data.source,a.editForm.img_atlas_data=t.data.data.group_pic,""==group_pic&&(window.group_pic=a.editForm.img_atlas_data),a.editForm.link=t.data.data.link,a.editForm.keyword=t.data.data.keyword,a.editForm.abstract=t.data.data.abstract,a.editForm.top=t.data.data.top.toString(),a.editForm.recommended=t.data.data.recommended.toString(),a.editForm.rolling=t.data.data.rolling.toString(),a.editForm.state=t.data.data.state.toString(),a.editForm.sort=t.data.data.sort,a.editForm.visits=t.data.data.visits,a.editForm.content=t.data.data.content,window.content_modify_submit_id=t.data.data.id,window.data_file_path=t.data.data.file_path,a.editForm.img=t.data.data.main_pic):swal(t.data.message+"!","","")}).catch(function(t){})},editSubmit:function(){var t=this;function e(t){return t<10?"0"+t:t}if($.isArray(this.editForm.category_id)&&(this.editForm.category_id=this.editForm.category_id.pop()),""==this.main_pic&&(this.main_pic=this.editForm.img),""==this.file_path&&(this.file_path=data_file_path),""!==this.editForm.time_value&&0!==this.editForm.time_value&&null!==this.editForm.time_value&&void 0!==this.editForm.time_value){var a=this.editForm.time_value,s=a.getFullYear()+"-"+e(a.getMonth()+1)+"-"+e(a.getDate()),l=e(a.getHours())+":"+e(a.getMinutes())+":"+e(a.getSeconds());this.editForm.release_time=s+" "+l}var o={file_path:this.file_path,release_time:this.editForm.release_time,category_id:this.editForm.category_id,title:this.editForm.title,source:this.editForm.source,main_pic:this.main_pic,group_pic:group_pic,link:this.editForm.link,keyword:this.editForm.keyword,abstract:this.editForm.abstract,top:this.editForm.top,recommended:this.editForm.recommended,rolling:this.editForm.rolling,state:this.editForm.state,sort:this.editForm.sort,visits:this.editForm.visits,content:this.editForm.content};i.default.cmsApi.articleEdit(content_modify_submit_id,o).then(function(e){200==e.data.code?(t.getResult(),t.list(),t.editFormVisible=!1,swal(e.data.message+"!","","success").then(function(t){})):swal(e.data.message+"!","","")}).catch(function(t){})},selectChange:function(t){this.selectList=t},handleDelete:function(t,e){var a=this,i=new Array;i.push(e.id),this.$confirm("确认删除该记录吗?","提示",{type:"warning"}).then(function(){a.listLoading=!0,a.$ajax({method:"post",url:"/admin/article/del",data:{ids:i}}).then(function(t){a.listLoading=!1,a.$message({message:"删除成功",type:"success"}),a.selectList=[],a.getResult()})}).catch(function(){})},handleDeleteList:function(){for(var t=this,e=this.selectList.length,a=new Array,i=0;i<e;i++)a.push(this.selectList[i].id);this.$confirm("确认删除该记录吗?","提示",{type:"warning"}).then(function(){t.listLoading=!0,t.$ajax({method:"post",url:"/admin/article/del",data:{ids:a}}).then(function(e){t.listLoading=!1,t.$message({message:"删除成功",type:"success"}),t.selectList=[],t.getResult()})}).catch(function(){})}},mounted:function(){this.getResult(),this.atlas(),this.list()}}},eTrs:function(t,e,a){"use strict";Object.defineProperty(e,"__esModule",{value:!0});var i=a("Vvfw"),s=a.n(i);for(var l in i)"default"!==l&&function(t){a.d(e,t,function(){return i[t]})}(l);var o=a("+XoU");var d=function(t){a("iOka")},r=a("VU/8")(s.a,o.a,!1,d,"data-v-419dbfea",null);e.default=r.exports},iOka:function(t,e){}});