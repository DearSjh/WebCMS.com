webpackJsonp([1],{"/7S3":function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=a("2xra"),r=a.n(i);for(var l in i)"default"!==l&&function(e){a.d(t,e,function(){return i[e]})}(l);var n=a("NQzJ");var o=function(e){a("Tv9b")},s=a("C7Lr")(r.a,n.a,!1,o,null,null);t.default=s.exports},"2xra":function(e,t,a){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=l(a("aA9S")),r=l(a("qzrg"));function l(e){return e&&e.__esModule?e:{default:e}}t.default={name:"messageboard",data:function(){return{listLoading:!1,pageInfo:{currentPage:1,pageSize:5,pageTotal:80},formSearch:{name:"",city:"",type:null,age:"",gender:null,qq:"",startdate:null,enddate:null},formEdit:{id:null,name:"",city:"",type:"",age:"",gender:null,qq:""},rulesEdit:{name:[{required:!0,message:"请输入姓名",trigger:"blur"},{min:2,max:4,message:"长度在 2 到 4 个字符",trigger:"blur"}],city:[{required:!0,message:"请输入城市",trigger:"blur"}],type:[{required:!0,message:"请选择类别",trigger:"change"}],gender:[{required:!0,message:"请选择性别",trigger:"change"}]},formEditTitle:"编辑",formEditDisabled:!1,dialogEdittVisible:!1,dialogType:"",tableData:[{id:"1",createtime:"2016-05-02",name:"李紫婷",address:"上海市普陀区金沙江路 1518 弄"},{id:"2",createtime:"2016-05-04",name:"杨超越",address:"上海市普陀区金沙江路 1517 弄"},{id:"3",createtime:"2016-05-01",name:"赖小七",address:"上海市普陀区金沙江路 1519 弄"},{id:"4",createtime:"2016-05-03",name:"张紫宁",address:"上海市普陀区金沙江路 1516 弄"}],labelPosition:"right",labelWidth:"80px",formLabelWidth:"120px",multipleSelection:[]}},computed:{},filters:{convertType:function(e){return 1==e?"留言":2==e?"建议":3==e?"BUG":void 0}},mounted:function(){this.onSearch();var e={ip:returnCitySN.cip,city:returnCitySN.cname+"-增删改查页"};r.default.shiroApi.loginLog(e)},methods:{onSearch:function(){var e=this;this.listLoading=!0,this.formSearch.createtime&&(this.formSearch.startdate=this.formSearch.createtime[0],this.formSearch.enddate=this.formSearch.createtime[1]);var t=(0,i.default)({},this.formSearch,this.pageInfo);r.default.msgApi.getList(t).then(function(t){if(e.listLoading=!1,t&&t.data){var a=t.data;"SUCCESS"==a.status?(e.pageInfo.pageTotal=a.count,e.tableData=a.data):a.message&&e.$message({message:a.message,type:"error"})}}).catch(function(t){e.listLoading=!1,e.$message({message:"查询异常，请重试",type:"error"})})},handleSave:function(){"add"==this.dialogType?this.save():"edit"==this.dialogType?this.update():this.$message({message:"操作异常",type:"error"})},save:function(){var e=this;this.$refs.formEdit.validate(function(t){if(t){var a=(0,i.default)({},e.formEdit);r.default.msgApi.add(a).then(function(t){if(t&&t.data){var a=t.data;if(a&&"SUCCESS"==a.status)return e.$message({message:"执行成功",type:"success"}),e.dialogEdittVisible=!1,void e.onSearch()}e.$message({message:"执行失败，请重试",type:"error"})}).catch(function(t){e.$message({message:"执行失败，请重试",type:"error"})})}})},update:function(){var e=this;this.$refs.formEdit.validate(function(t){if(t){var a=(0,i.default)({},e.formEdit);r.default.msgApi.update(a).then(function(t){if(t&&t.data){var a=t.data;if(a&&"SUCCESS"==a.status)return e.$message({message:"执行成功",type:"success"}),e.dialogEdittVisible=!1,void e.onSearch()}e.$message({message:"执行失败，请重试",type:"error"})}).catch(function(t){e.$message({message:"执行失败，请重试",type:"error"})})}})},handleDelete:function(e,t){var a=this;if("使用文档"!=t.name){var i=t.id;this.$confirm("此操作将永久删除该文件, 是否继续?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){r.default.msgApi.delete({id:i}).then(function(e){a.$common.isSuccess(e,function(){a.onSearch()})}).catch(function(e){a.$message({message:"执行失败，请重试",type:"error"})})}).catch(function(){a.$message({type:"info",message:"已取消删除"})})}else this.$message("使用文档不可删除")},deleteMany:function(){var e=this,t=this.multipleSelection.map(function(e){return e.id});0!=t.length?this.$confirm("此操作将批量永久删除文件, 是否继续?","提示",{confirmButtonText:"确定",cancelButtonText:"取消",type:"warning"}).then(function(){r.default.msgApi.deleteBatch({ids:t}).then(function(t){e.$common.isSuccess(t,function(){e.onSearch()})}).catch(function(t){e.$message({message:"执行失败，请重试",type:"error"})})}).catch(function(){e.$message({type:"info",message:"已取消删除"})}):this.$message({message:"请选择要删除的项",type:"warn"})},onReset:function(){this.$refs.formSearch.resetFields()},handleAdd:function(){var e=this;this.dialogEdittVisible=!0,this.$nextTick(function(){e.dialogType="add",e.formEditTitle="新增",e.formEditDisabled=!1})},handleEdit:function(e,t){var a=this;this.dialogEdittVisible=!0,this.$nextTick(function(){a.dialogType="edit",a.formEditTitle="编辑",a.formEditDisabled=!1,a.formEdit=(0,i.default)({},t),a.formEdit.gender+=""})},handleDetail:function(e,t){var a=this;this.dialogEdittVisible=!0,this.$nextTick(function(){a.dialogType="show",a.formEditTitle="详情",a.formEditDisabled=!0,a.formEdit=(0,i.default)({},t),a.formEdit.gender+=""})},closeDialog:function(e){this.$refs[e].resetFields()},handleSizeChange:function(e){this.pageInfo.pageSize=e,this.onSearch()},handleCurrentChange:function(e){this.pageInfo.currentPage=e,this.onSearch()},handleSelectionChange:function(e){this.multipleSelection=e},openDetail:function(e){this.$common.OpenNewPage(this,"detail",e)}}}},NQzJ:function(e,t,a){"use strict";var i={render:function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"container messageboard"},[a("el-form",{ref:"formSearch",staticClass:"demo-form-inline",attrs:{"label-position":e.labelPosition,"label-width":e.labelWidth,inline:!0,model:e.formSearch}},[a("el-form-item",{attrs:{label:"昵称",prop:"name"}},[a("el-input",{attrs:{placeholder:"模糊匹配"},model:{value:e.formSearch.name,callback:function(t){e.$set(e.formSearch,"name",t)},expression:"formSearch.name"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"城市",prop:"city"}},[a("el-input",{attrs:{placeholder:"城市"},model:{value:e.formSearch.city,callback:function(t){e.$set(e.formSearch,"city",t)},expression:"formSearch.city"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"类别",prop:"type"}},[a("el-select",{attrs:{placeholder:"活动区域"},model:{value:e.formSearch.type,callback:function(t){e.$set(e.formSearch,"type",t)},expression:"formSearch.type"}},[a("el-option",{attrs:{label:"留言",value:"1"}}),e._v(" "),a("el-option",{attrs:{label:"建议",value:"2"}}),e._v(" "),a("el-option",{attrs:{label:"BUG",value:"3"}})],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"年龄",prop:"age"}},[a("el-input",{attrs:{type:"number",placeholder:"年龄"},model:{value:e.formSearch.age,callback:function(t){e.$set(e.formSearch,"age",t)},expression:"formSearch.age"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"性别",prop:"gender"}},[a("el-select",{attrs:{placeholder:"性别"},model:{value:e.formSearch.gender,callback:function(t){e.$set(e.formSearch,"gender",t)},expression:"formSearch.gender"}},[a("el-option",{attrs:{label:"男",value:"1"}}),e._v(" "),a("el-option",{attrs:{label:"女",value:"2"}})],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"qq号",prop:"qq"}},[a("el-input",{attrs:{placeholder:"qq号"},model:{value:e.formSearch.qq,callback:function(t){e.$set(e.formSearch,"qq",t)},expression:"formSearch.qq"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"创建时间",prop:"createtime"}},[a("el-date-picker",{attrs:{type:"daterange","range-separator":"至","start-placeholder":"开始日期","end-placeholder":"结束日期"},model:{value:e.formSearch.createtime,callback:function(t){e.$set(e.formSearch,"createtime",t)},expression:"formSearch.createtime"}})],1),e._v(" "),a("el-form-item",{staticStyle:{"margin-left":"50px"},attrs:{label:" "}},[a("el-button",{attrs:{type:"primary"},on:{click:e.onSearch}},[e._v("查询")]),e._v(" "),a("el-button",{attrs:{type:"warning",plain:""},on:{click:e.onReset}},[e._v("重置")])],1)],1),e._v(" "),a("el-row",{staticClass:"mgb15"},[a("el-button",{attrs:{size:"small",round:"",type:"primary"},on:{click:e.handleAdd}},[e._v("新增")]),e._v(" "),a("el-button",{attrs:{size:"small",round:"",type:"danger"},on:{click:e.deleteMany}},[e._v("批量删除")])],1),e._v(" "),a("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],staticStyle:{width:"100%"},attrs:{data:e.tableData,border:"",stripe:""},on:{"selection-change":e.handleSelectionChange}},[a("el-table-column",{attrs:{type:"selection",width:"60"}}),e._v(" "),a("el-table-column",{attrs:{prop:"name",label:"昵称",width:"150",align:"center",sortable:""},scopedSlots:e._u([{key:"default",fn:function(t){return[a("a",{staticStyle:{color:"#00D1B2"},attrs:{href:"javacript:;"},on:{click:function(a){return e.openDetail(t.row)}}},[e._v(e._s(t.row.name))])]}}])}),e._v(" "),a("el-table-column",{attrs:{prop:"city",label:"城市",align:"center",width:"150"}}),e._v(" "),a("el-table-column",{attrs:{prop:"type",label:"类别",align:"center",width:"150"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",[e._v(e._s(e._f("convertType")(t.row.type)))])]}}])}),e._v(" "),a("el-table-column",{attrs:{prop:"age",label:"年龄",align:"center",width:"100"}}),e._v(" "),a("el-table-column",{attrs:{prop:"gender",label:"性别",align:"center",width:"100"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("span",[e._v(e._s(1==t.row.gender?"男":"女"))])]}}])}),e._v(" "),a("el-table-column",{attrs:{prop:"createtime",label:"创建日期",formatter:this.$common.timestampToTime,width:"180",sortable:""}}),e._v(" "),a("el-table-column",{attrs:{prop:"updatetime",label:"更新日期",formatter:this.$common.timestampToTime,width:"180",sortable:""}}),e._v(" "),a("el-table-column",{attrs:{label:"操作",fixed:"right","min-width":"230"},scopedSlots:e._u([{key:"default",fn:function(t){return[a("el-button",{attrs:{size:"mini",plain:"",type:"primary"},on:{click:function(a){return e.handleDetail(t.$index,t.row)}}},[e._v("详情")]),e._v(" "),a("el-button",{attrs:{size:"mini"},on:{click:function(a){return e.handleEdit(t.$index,t.row)}}},[e._v("编辑")]),e._v(" "),a("el-button",{attrs:{size:"mini",plain:"",type:"danger"},on:{click:function(a){return e.handleDelete(t.$index,t.row)}}},[e._v("删除")])]}}])})],1),e._v(" "),a("el-pagination",{attrs:{background:"",layout:"total,sizes,prev, pager, next,jumper","current-page":e.pageInfo.currentPage,"page-size":e.pageInfo.pageSize,total:e.pageInfo.pageTotal,"page-sizes":[5,10,20,50]},on:{"size-change":e.handleSizeChange,"current-change":e.handleCurrentChange}}),e._v(" "),a("el-dialog",{attrs:{title:e.formEditTitle,visible:e.dialogEdittVisible,width:"700px"},on:{"update:visible":function(t){e.dialogEdittVisible=t},close:function(t){return e.closeDialog("formEdit")}}},[a("el-form",{ref:"formEdit",staticClass:"demo-form-inline",attrs:{"label-position":e.labelPosition,"label-width":e.labelWidth,rules:e.rulesEdit,disabled:e.formEditDisabled,inline:!0,model:e.formEdit}},[a("el-form-item",{attrs:{label:"姓名",prop:"name"}},[a("el-input",{attrs:{placeholder:"姓名"},model:{value:e.formEdit.name,callback:function(t){e.$set(e.formEdit,"name",t)},expression:"formEdit.name"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"城市",prop:"city"}},[a("el-input",{attrs:{placeholder:"地址"},model:{value:e.formEdit.city,callback:function(t){e.$set(e.formEdit,"city",t)},expression:"formEdit.city"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"类别",prop:"type"}},[a("el-select",{attrs:{placeholder:"类别"},model:{value:e.formEdit.type,callback:function(t){e.$set(e.formEdit,"type",t)},expression:"formEdit.type"}},[a("el-option",{attrs:{label:"留言",value:"1"}}),e._v(" "),a("el-option",{attrs:{label:"建议",value:"2"}}),e._v(" "),a("el-option",{attrs:{label:"BUG",value:"3"}})],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"年龄",prop:"age"}},[a("el-input",{attrs:{placeholder:"年龄"},model:{value:e.formEdit.age,callback:function(t){e.$set(e.formEdit,"age",t)},expression:"formEdit.age"}})],1),e._v(" "),a("el-form-item",{attrs:{label:"性别",prop:"gender"}},[a("el-select",{attrs:{placeholder:"性别"},model:{value:e.formEdit.gender,callback:function(t){e.$set(e.formEdit,"gender",t)},expression:"formEdit.gender"}},[a("el-option",{attrs:{label:"男",value:"1"}}),e._v(" "),a("el-option",{attrs:{label:"女",value:"2"}})],1)],1),e._v(" "),a("el-form-item",{attrs:{label:"qq",prop:"qq"}},[a("el-input",{attrs:{placeholder:"QQ号"},model:{value:e.formEdit.qq,callback:function(t){e.$set(e.formEdit,"qq",t)},expression:"formEdit.qq"}})],1)],1),e._v(" "),a("div",{staticClass:"dialog-footer",attrs:{slot:"footer"},slot:"footer"},[a("el-button",{on:{click:function(t){e.dialogEdittVisible=!1}}},[e._v("取 消")]),e._v(" "),e.formEditDisabled?e._e():a("el-button",{attrs:{type:"primary"},on:{click:e.handleSave}},[e._v("确 定")])],1)],1)],1)},staticRenderFns:[]};t.a=i},Tv9b:function(e,t){}});