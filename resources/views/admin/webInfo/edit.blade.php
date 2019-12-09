@extends('layouts.admin')
@section('title', '编辑网站信息配置')

@section('content')

    <style>
        .rows {
            justify-content: center;
            display: flex;
            /*margin-right: -10px;*/
            margin-left: -10px;
            /*margin: auto 0px;*/
        }

        .tit {
            margin: auto 0px;
        }
    </style>

    <div class="content">
        <div id="app">
            <div style="padding-top: 40px;text-align: center">

                <input placeholder="id" class="el-input__inner" type="text" v-model="id"
                       style="width: 280px !important;font-size: 13px;display: none"
                       name="id"  value="{{$list->url}}">

                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label>网站地址</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="网站地址" class="el-input__inner" type="text" v-model="url"
                               style="width: 280px !important;font-size: 13px;"
                               name="url" value="{{$list->url}}">
                    </dd>
                    <dd class="tit">
                        <i class="el-icon-question" style="font-size: 20px"></i>
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label>SEO标题</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="SEO标题" class="el-input__inner" type="text" v-model="seo_title"
                               style="width: 280px !important;font-size: 13px;"
                               name="seo_title" value="{{$list->seo_title}}">
                    </dd>

                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label for="">关键字设置</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="关键字设置" class="el-input__inner" name="keyword" v-model="keyword"
                               value="{{$list->keyword}}"
                               type="text"
                               style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label>网站描述</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="网站描述" class="el-input__inner" type="text" v-model="describe" name="describe"
                               value="{{$list->describe}}" style="width: 280px !important;
                         font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label for="">版权信息</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="版权信息" class="el-input__inner" name="copyright"
                               v-model="copyright"
                               value="{{$list->copyright}}"
                               type="text"
                               style="
                                width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label>客服热线</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="客服热线" class="el-input__inner" name="hotline"
                               v-model="hotline"
                               value="{{$list->hotline}}"
                               type="text" style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label for="">备案编号</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="备案编号" class="el-input__inner" name="record" value="{{$list->record}}"
                               type="text"
                               v-model="record"
                               style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label>流量统计代码</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="流量统计代码" class="el-input__inner" name="traffic_statistics"
                               v-model="traffic_statistics"
                               value="{{$list->traffic_statistics}}"
                               type="text" style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label for="">在线QQ</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="在线QQ（多个用“,”分割）" class="el-input__inner" name="online_qq"
                               value="{{$list->online_qq}}"
                               v-model="online_qq"
                               type="text"
                               style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label>联系人</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="联系人" class="el-input__inner" name="contact" value="{{$list->contact}}"
                               v-model="contact"
                               type="text" style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label for="">邮箱</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="邮箱" class="el-input__inner" name="email" value="{{$list->email}}"
                               type="text"
                               v-model="email"
                               style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label>联系人电话</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="联系人电话" class="el-input__inner" name="phone" value="{{$list->phone}}"
                               v-model="phone"
                               type="text" style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label for="">公司地址</label>
                    </dt>
                    <dd class="tit">
                        <input placeholder="公司地址" class="el-input__inner" name="address" value="{{$list->address}}"
                               v-model="address"
                               type="text"
                               style="width: 280px !important;font-size: 13px;">
                    </dd>
                </dl>
                <dl class="rows">
                    <dt class="tit" style="width: 100px;">
                        <label for="">LOGO(上传)</label>
                    </dt>
                    <dd class="tit">
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
                <div style="padding: 12px 0 10px 135px;">
                    <button style="" class="el-button el-button--primary is-round" @click="submit">确认提交
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Vue({
            el: '#app',
            data: function () {
                return {
                    visible: false,
                    dialogVisible: false,
                    dialogImageUrl: '',
                    dialogImg: false,
                    disabled: false,
                    web_img: '',

                    id: "",
                    url: "",
                    logo: "",
                    seo_title: "",
                    keyword: "",
                    describe: "",
                    copyright: "",
                    hotline: "",
                    record: "",
                    traffic_statistics: "",
                    online_qq: "",
                    contact: "",
                    email: "",
                    phone: "",
                    address: ""
                }
            },
            mounted: function () {
                this.id = "{{$list->id}}",
                this.url = "{{$list->url}}",
                this.logo = "{{$list->logo}}",
                this.seo_title = "{{$list->seo_title}}",
                    this.keyword = "{{$list->keyword}}",
                    this.describe = "{{$list->describe}}",
                    this.copyright = "{{$list->copyright}}",
                    this.hotline = "{{$list->hotline}}",
                    this.record = "{{$list->record}}",
                    this.traffic_statistics = "{{$list->traffic_statistics}}",
                    this.online_qq = "{{$list->online_qq}}",
                    this.contact = "{{$list->contact}}",
                    this.email = "{{$list->email}}",
                    this.phone = "{{$list->phone}}",
                    this.address = "{{$list->address}}"
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
                    this.web_img = response.data.newFileDir
                },

                submit() {
                    axios.post('/admin/webInfo', {
                        logo: this.web_img,
                        id: this.id,
                        url: this.url,
                        seo_title: this.seo_title,
                        keyword: this.keyword,
                        describe: this.describe,
                        copyright: this.copyright,
                        hotline: this.hotline,
                        record: this.record,
                        traffic_statistics: this.traffic_statistics,
                        online_qq: this.online_qq,
                        contact: this.contact,
                        email: this.email,
                        phone: this.phone,
                        address: this.address
                    }).then(function (response) {
                        if (response.data.code == 200){
                            swal(response.data.message+"!", "", "success").then((value) => {
                                window.location.reload()
                            });
                        }else {
                            swal(response.data.message+"!", "", "");
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }
        })
    </script>
@endsection