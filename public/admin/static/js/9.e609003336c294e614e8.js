webpackJsonp([9],{"6n2y":function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var l=a("GV98"),o=a.n(l);for(var r in l)"default"!==r&&function(e){a.d(t,e,function(){return l[e]})}(r);var i=a("rKYw");var s=function(e){a("J9wA")},n=a("C7Lr")(o.a,i.a,!1,s,null,null);t.default=n.exports},GV98:function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var l=r(a("aA9S")),o=r(a("3cXf"));function r(e){return e&&e.__esModule?e:{default:e}}t.default={name:"tablepage",data:function(){return{pageInfo:{pageIndex:3,pageSize:5,pageTotal:80},tableData:[{id:"1",date:"2016-05-02",name:"李紫婷",address:"上海市普陀区金沙江路 1518 弄"},{id:"2",date:"2016-05-04",name:"杨超越",address:"上海市普陀区金沙江路 1517 弄"},{id:"3",date:"2016-05-01",name:"赖小七",address:"上海市普陀区金沙江路 1519 弄"},{id:"4",date:"2016-05-03",name:"张紫宁",address:"上海市普陀区金沙江路 1516 弄"}],formSearch:{user:"",region:""},labelPosition:"right",labelWidth:"80px",form:{name:"",region:"",date1:"",date2:"",delivery:!1,type:[],resource:"",desc:""},dialogFormVisible:!1,dialogAddVisible:!1,formLabelWidth:"120px",formAdd:{name:"",address:"",date:"",other:""},formEdit:{name:"",address:"",date:"",other:""},multipleSelection:[]}},methods:{handleEdit:function(e,t){var a="索引是:"+e+",行内容是:"+(0,o.default)(t);this.$message({message:a,type:"success"}),this.formEdit=t,this.dialogFormVisible=!0},handleDelete:function(e,t){var a=this,l="索引是:"+e+",行内容是:"+(0,o.default)(t);this.$confirm("此操作将永久删除该文件, 是否继续?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){a.tableData.splice(e,1),a.$message({type:"success",message:"删除成功!"+l})}).catch(function(){a.$message({type:"info",message:"已取消删除"})})},handleSizeChange:function(e){this.pageInfo.pageSize=e,this.$message({message:"第"+this.pageInfo.pageIndex+"页，size:"+this.pageInfo.pageSize,type:"success"})},handleCurrentChange:function(e){this.pageInfo.pageIndex=e,this.$message({message:"第"+this.pageInfo.pageIndex+"页，size:"+this.pageInfo.pageSize,type:"success"})},onSubmit:function(){console.log("submit!")},handleSelectionChange:function(e){this.multipleSelection=e,this.$message({message:"选中的项是:"+(0,o.default)(this.multipleSelection),type:"success"})},deleteMany:function(){this.multipleSelection.map(function(e){return e.id}).join();this.$message({message:"删除的项是:"+(0,o.default)(this.multipleSelection),type:"success"})},save:function(){var e=(0,l.default)({},this.formAdd);this.tableData.push(e),this.dialogAddVisible=!1}}}},J9wA:function(e,t){},rKYw:function(e,t,a){"use strict";var l={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"container"},[a("el-form",{staticClass:"demo-form-inline",attrs:{"label-position":e.labelPosition,"label-width":e.labelWidth,inline:!0,model:e.formSearch}},[a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formSearch.user,callback:function(t){e.$set(e.formSearch,"user",t)},expression:"formSearch.user"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"活动区域"}},[a("el-select",{attrs:{placeholder:"活动区域"},model:{value:e.formSearch.region,callback:function(t){e.$set(e.formSearch,"region",t)},expression:"formSearch.region"}},[a("el-option",{attrs:{label:"区域一",value:"shanghai"}}),e._v(" "),a("el-option",{attrs:{label:"区域二",value:"beijing"}})],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formSearch.user,callback:function(t){e.$set(e.formSearch,"user",t)},expression:"formSearch.user"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formSearch.user,callback:function(t){e.$set(e.formSearch,"user",t)},expression:"formSearch.user"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formSearch.user,callback:function(t){e.$set(e.formSearch,"user",t)},expression:"formSearch.user"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formSearch.user,callback:function(t){e.$set(e.formSearch,"user",t)},expression:"formSearch.user"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formSearch.user,callback:function(t){e.$set(e.formSearch,"user",t)},expression:"formSearch.user"}})],1),e._v(" "),a("el-form-item",{attrs:{label:" "}},[a("el-button",{attrs:{type:"primary"},on:{click:e.onSubmit}},[e._v("查询")])],1)],1),e._v(" "),a("el-row",{staticClass:"mgb15"},[a("el-button",{attrs:{size:"small",round:"",type:"primary"},on:{click:function(t){e.dialogAddVisible=!0}}},[e._v("新增")]),e._v(" "),a("el-button",{attrs:{size:"small",round:"",type:"danger"},on:{click:e.deleteMany}},[e._v("批量删除")])],1),e._v(" "),a("el-table",{staticStyle:{width:"100%"},attrs:{data:e.tableData,border:"",stripe:""},on:{"selection-change":e.handleSelectionChange}},[a("el-table-column",{attrs:{type:"selection",width:"55"}}),e._v(" "),a("el-table-column",{attrs:{prop:"date",label:"日期",width:"180",sortable:""}}),e._v(" "),a("el-table-column",{attrs:{prop:"name",label:"姓名",width:"180",sortable:""}}),e._v(" "),a("el-table-column",{attrs:{prop:"address",label:"地址"}}),e._v(" "),a("el-table-column",{attrs:{label:"操作",fixed:"right","min-width":"180"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-button",{attrs:{size:"mini"},on:{click:function(a){return e.handleEdit(t.$index,t.row)}}},[e._v("编辑")]),e._v(" "),a("el-button",{attrs:{size:"mini",type:"danger"},on:{click:function(a){return e.handleDelete(t.$index,t.row)}}},[e._v("删除")])]}}])})],1),e._v(" "),a("el-pagination",{attrs:{background:"",layout:"total,sizes,prev, pager, next,jumper","current-page":e.pageInfo.pageIndex,"page-size":e.pageInfo.pageSize,total:e.pageInfo.pageTotal,"page-sizes":[5,10,20,50]},on:{"size-change":e.handleSizeChange,"current-change":e.handleCurrentChange}}),e._v(" "),a("el-dialog",{attrs:{title:"收货地址",visible:e.dialogFormVisible,width:"700px"},on:{"update:visible":function(t){e.dialogFormVisible=t}}},[a("el-form",{staticClass:"demo-form-inline",attrs:{"label-position":e.labelPosition,"label-width":e.labelWidth,inline:!0,model:e.formEdit}},[a("el-form-item",{attrs:{label:"姓名"}},[a("el-input",{attrs:{placeholder:"姓名"},model:{value:e.formEdit.name,callback:function(t){e.$set(e.formEdit,"name",t)},expression:"formEdit.name"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"地址"}},[a("el-input",{attrs:{placeholder:"地址"},model:{value:e.formEdit.address,callback:function(t){e.$set(e.formEdit,"address",t)},expression:"formEdit.address"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"日期"}},[a("el-date-picker",{staticStyle:{width:"100%"},attrs:{type:"date",format:"yyyy 年 MM 月 dd 日","value-format":"yyyy-MM-dd",placeholder:"日期"},model:{value:e.formEdit.date,callback:function(t){e.$set(e.formEdit,"date",t)},expression:"formEdit.date"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formEdit.other,callback:function(t){e.$set(e.formEdit,"other",t)},expression:"formEdit.other"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formEdit.other,callback:function(t){e.$set(e.formEdit,"other",t)},expression:"formEdit.other"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formEdit.other,callback:function(t){e.$set(e.formEdit,"other",t)},expression:"formEdit.other"}})],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.dialogFormVisible=!1}}},[e._v("取 消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:function(t){e.dialogFormVisible=!1}}},[e._v("确 定")])],1)],1),e._v(" "),a("el-dialog",{attrs:{title:"新增记录",visible:e.dialogAddVisible,width:"700px"},on:{"update:visible":function(t){e.dialogAddVisible=t}}},[a("el-form",{staticClass:"demo-form-inline",attrs:{"label-position":e.labelPosition,"label-width":e.labelWidth,inline:!0,model:e.formAdd}},[a("el-form-item",{attrs:{label:"姓名"}},[a("el-input",{attrs:{placeholder:"姓名"},model:{value:e.formAdd.name,callback:function(t){e.$set(e.formAdd,"name",t)},expression:"formAdd.name"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"地址"}},[a("el-input",{attrs:{placeholder:"地址"},model:{value:e.formAdd.address,callback:function(t){e.$set(e.formAdd,"address",t)},expression:"formAdd.address"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"日期"}},[a("el-date-picker",{staticStyle:{width:"100%"},attrs:{type:"date",format:"yyyy 年 MM 月 dd 日","value-format":"yyyy-MM-dd",placeholder:"日期"},model:{value:e.formAdd.date,callback:function(t){e.$set(e.formAdd,"date",t)},expression:"formAdd.date"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formAdd.other,callback:function(t){e.$set(e.formAdd,"other",t)},expression:"formAdd.other"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formAdd.other,callback:function(t){e.$set(e.formAdd,"other",t)},expression:"formAdd.other"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"审批人"}},[a("el-input",{attrs:{placeholder:"审批人"},model:{value:e.formAdd.other,callback:function(t){e.$set(e.formAdd,"other",t)},expression:"formAdd.other"}})],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.dialogAddVisible=!1}}},[e._v("取 消")]),e._v(" "),a("el-button",{attrs:{type:"primary"},on:{click:e.save}},[e._v("确 定")])],1)],1)],1)},staticRenderFns:[]};t.a=l}});