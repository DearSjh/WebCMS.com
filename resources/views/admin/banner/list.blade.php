@extends('layouts.admin')
@section('title', '轮播图列表')

@section('content')
    <style>
        em {
            font: bold 14px/20px tahoma, verdana;
            color: #F60;
            vertical-align: middle;
            display: inline-block;
            margin-right: 5px;
            /*margin-left: -14px;*/
        }

        .mDiv {
            background-color: #FFF;
            color: #333;
            white-space: nowrap;
            display: block;
            position: relative;
            padding: 40px 0px;
            min-height: 30px;
        }

        .ftitle {
            font-size: 0;
            height: 24px;
            float: left;
        }

        .mDiv .ftitle h3 {
            font-size: 14px;
            color: #333;
            margin-right: 6px;
            display: inline-block;
            text-indent: 8px;
            border-left: 2px solid #88B7E0;
        }

        .mDiv .ftitle h5 {
            font-size: 12px;
            font-weight: normal;
            line-height: 19px;
            color: #777;
            vertical-align: bottom;
            letter-spacing: normal;
            display: inline-block;
            padding: 0;
        }

        .fbutton {
            float: right;
            padding-right: 0px;
            margin-right: 0px;
        }

        .fbutton .rows {
            display: flex;
            justify-content: center;
        }

        .fbutton .add {
            width: 150px;
            height: 40px;
            margin-top: -10px;
            padding: 2px 16px;
            color: #fff;
            background-color: #FF6666;
            border-color: #FF6666;
            border-radius: 3px;
        }

        .hDiv {
            background-color: #f7f7f7;
            border: 1px solid #f7f7f7;
        }

        .hDivBox {
            height: 50px;
            line-height: 50px;
        }

        /*分页*/
        .pagination > li > a, .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #337ab7;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }

        .pagination > li > a:hover {
            background: #ddd;
        }
    </style>

    <div class="content">
        <div id="app">
            <div class="mDiv">
                <div class="ftitle">
                    <h3>轮播图列表</h3>
                    <h5>(共0条数据)</h5>
                </div>

                <div title="刷新数据" style="float: left"><i class="el-icon-refresh"></i></div>

                {{--vue 提交栏目表单 ajax--}}
                <div class="fbutton">
                    <el-button @click="dialogVisible = true" class="add">
                        <span><i class="fa fa-plus"></i>增加链接</span>
                    </el-button>
                    <el-dialog
                            :visible.sync="dialogVisible"
                            style="display: none">
                        <div class="" style="text-align: center">
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>标题</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" v-model="banner_title" class="el-input__inner">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>跳转链接</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" v-model="banner_link" class="el-input__inner">
                                </dd>
                            </dl>

                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>开启状态</label>
                                </dt>
                                <dd class="opt" style="width: 185px;height: 48px">
                                    <el-radio  v-model="state" label="1">开启</el-radio>
                                    <el-radio  v-model="state" label="0">关闭</el-radio>
                                </dd>
                            </dl>

                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>上传类型</label>
                                </dt>
                                <dd class="opt" style="width: 185px;height: 48px">
                                    <el-radio  v-model="banner_state" label="1">本地</el-radio>
                                    <el-radio  v-model="banner_state" label="0">链接</el-radio>
                                </dd>
                            </dl>

                            {{--本地上传--}}
                            <dl v-if="banner_state==1" class="rows">
                                <dt style="text-align: left;width: 160px;">
                                    <label><em>*</em>上传图片</label>
                                </dt>
                                <dd class="opt" style="width: 175px;">
                                    {{--element 图片上传--}}
                                    <el-upload
                                            action="/admin/uploadImage"
                                            list-type="picture-card"
                                            :on-preview="handlePictureCardPreview"
                                            :on-remove="handleRemove"
                                            :on-success="success">
                                        <i class="el-icon-plus"></i>
                                    </el-upload>
                                    <el-dialog :visible.sync="dialogImg">
                                        <img width="100%" :src="dialogImageUrl" alt="">
                                    </el-dialog>
                                </dd>
                            </dl>

                            {{--链接上传--}}
                            <dl v-if="banner_state==0" class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>上传图片</label>
                                </dt>
                                <dd class="opt" style="width: 184px;">
                                    <input type="text" v-model="banner_link_img" class="el-input__inner">
                                </dd>
                            </dl>


                        </div>
                        <span slot="footer" class="dialog-footer">
                            <el-button type="primary" @click="banner_submit()">提交</el-button>
                          </span>
                    </el-dialog>
                </div>

                {{--vue 修改栏目表单 ajax--}}
                <div class="fbutton">
                    <el-dialog
                            :visible.sync="bannerModify"
                            style="display: none">
                        <div class="" style="text-align: center">
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>标题</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" v-model="banner_title" class="banner_title el-input__inner">
                                </dd>
                            </dl>
                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>跳转链接</label>
                                </dt>
                                <dd class="opt">
                                    <input type="text" v-model="banner_link" class="banner_link el-input__inner">
                                </dd>
                            </dl>

                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>开启状态</label>
                                </dt>
                                <dd class="opt" style="width: 185px;height: 48px">
                                    <el-radio  v-model="state" label="1">开启</el-radio>
                                    <el-radio  v-model="state" label="0">关闭</el-radio>
                                </dd>
                            </dl>

                            <dl class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>上传类型</label>
                                </dt>
                                <dd class="opt" style="width: 185px;height: 48px">
                                    <el-radio  v-model="banner_state" label="1" class="banner_state">本地</el-radio>
                                    <el-radio  v-model="banner_state" label="0" class="banner_state">链接</el-radio>
                                </dd>
                            </dl>

                            {{--本地上传--}}
                            <dl v-if="banner_state==1" class="rows">
                                <dt style="text-align: left;width: 160px;">
                                    <label><em>*</em>上传图片</label>
                                </dt>
                                <dd class="opt" style="width: 175px;">
                                    {{--element 图片上传--}}
                                    <el-upload
                                            action="/admin/uploadImage"
                                            list-type="picture-card"
                                            :on-preview="handlePictureCardPreview"
                                            :on-remove="handleRemove"
                                            :on-success="success">
                                        <i class="el-icon-plus"></i>
                                    </el-upload>
                                    <el-dialog :visible.sync="dialogImg">
                                        <img width="100%" :src="dialogImageUrl" alt="">
                                    </el-dialog>
                                </dd>
                            </dl>

                            {{--链接上传--}}
                            <dl v-if="banner_state==0" class="rows">
                                <dt style="text-align: left;width: 150px;">
                                    <label><em>*</em>上传图片</label>
                                </dt>
                                <dd class="opt" style="width: 184px;">
                                    <input type="text" v-model="banner_link_img" class="el-input__inner">
                                </dd>
                            </dl>


                        </div>
                        <span slot="footer" class="dialog-footer">
                            <el-button type="primary" @click="banner_modify_submit">提交</el-button>
                          </span>
                    </el-dialog>
                </div>
            </div>
            <div class="hDiv">
                <div class="hDivBox">
                    <table cellpadding="0" cellspacing="0" style="width: 90%;text-align: center">
                        {{--头部--}}
                        <thead>
                        <tr>
                            <th>
                                <div class="sundefined tc">
                                    ID
                                </div>
                            </th>
                            <th>
                                <div class="sundefined" style="padding-left: 15px">
                                    网站LOGO
                                </div>
                            </th>
                            <th>
                                <div>
                                    站点名称
                                </div>
                            </th>
                            <th>
                                <div class="tc">
                                    站点URL
                                </div>
                            </th>
                            <th>
                                <div class="tl" style="text-indent: 6px">
                                    操作（已发布,修改,删除）
                                </div>
                            </th>
                        </tr>
                        </thead>

                        {{--给后台数据渲染部分  内容--}}
                        <thead>
                        @foreach ($list as $sort)
                            <tr>
                                <td>
                                    <div>
                                        {{ $sort->id}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $sort->picture}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        {{ $sort->title}}
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <div class="tc">{{ $sort->link}}</div>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button type="button" class="el-button add el-button--warning"
                                                @click="banner_modify({{$sort->id}})">
                                            修改
                                        </button>
                                        <button type="button" class="el-button add el-button--danger"
                                                @click="banner_delete({{$sort->id}})">
                                            删除
                                        </button>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </thead>
                    </table>
                    {{--分页--}}
                    {{$list -> links()}}

                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: function () {
                return {
                    // 提交栏目
                    visible: false,
                    dialogVisible: false,
                    dialogImageUrl: '',
                    dialogImg: false,
                    disabled: false,

                    //标题
                    banner_title:'',

                    //跳转链接
                    banner_link:'',

                    //本地图片上传
                    banner_img: '',
                    //链接图片上传
                    banner_link_img:'',

                    // 修改栏目
                    bannerModify: false,

                    //状态
                    state:'',

                    //图片上传方式
                    banner_state:'1',
                }
            },
            methods: {
                //图片上传
                handleRemove(file, fileList) {
                    console.log(file, fileList);
                },
                handlePictureCardPreview(file) {
                    console.log(file)
                    this.dialogImageUrl = file.url;
                    this.dialogImg = true;
                },
                success(response, file, fileList) {
                    this.banner_img = response.data.newFileDir
                },

                //提交
                banner_submit() {

                    if (this.banner_state == 1){
                        var picture_path = this.banner_img
                    }
                    if (this.banner_state == 0) {
                        var picture_path = this.banner_link_img
                    }

                    axios.post('/admin/banner/add', {

                        //状态
                        state:this.state,

                        //标题
                        title: this.banner_title,

                        //跳转链接
                        link:this.banner_link,

                        //本地图片上传
                        picture: picture_path,

                    }).then(function (data) {
                        if (data.data.code != 200) {
                            alert(data.data.message)
                        }else {
                            window.location.reload()
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                },

                //删除
                banner_delete(id) {
                    this.$confirm('确认删除？')
                        .then(_ => {
                            //确定
                            $.ajax({
                                //请求方式为get
                                type: "GET",
                                //url接口地址
                                url: "/admin/banner/del/"+id,
                                data: {},
                                //返回数据格式为json
                                dataType: "json",
                                //请求成功完成后要执行的方法
                                success: function (data) {
                                    if (data.code != 200) {
                                        alert(data.message)
                                    }else {
                                        window.location.reload()
                                    }
                                }
                            });
                        })
                        .catch(_ => {
                            //取消
                        });
                },

                //修改
                banner_modify(id) {
                    this.bannerModify = true
                    axios.get("/admin/banner/edit/"+id).then(function (data) {
                        if (data.data.code != 200) {
                            alert(data.message)
                        }else {
                            window.banner_modify_submit_id = data.data.data.id
                            //状态

                            window.state = data.data.data.state

                            //标题
                            $('.banner_title').val(data.data.data.title)

                            //跳转链接
                            $('.banner_link').val(data.data.data.link)

                        }
                    });
                },
                //修改提交
                banner_modify_submit(){
                    if (this.banner_state == 1){
                        var picture_path = this.banner_img
                    }
                    if (this.banner_state == 0) {
                        var picture_path = this.banner_link_img
                    }

                    axios.post("/admin/banner/edit/"+banner_modify_submit_id, {

                        //状态
                        state:this.state,

                        //标题
                        title: this.banner_title,

                        //跳转链接
                        link:this.banner_link,

                        //本地图片上传
                        picture: picture_path,

                    }).then(function (data) {
                        if (data.data.code != 200) {
                            alert(data.data.message)
                        }else {
                            window.location.reload()
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }
        })
    </script>

@endsection