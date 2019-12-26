<!-- timeline item -->
<li class="resetcontailer">
    <i class="fa fa-user bg-yellow"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

        <h3 class="timeline-header"><a href="#">产品信息</a> 产品信息描述</h3>

        <div class="timeline-body">
            <div class="row">
                <div class="form-group col-md-6">
                    {{Form::label('brandname', '品牌名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandname',null, array('class' => 'form-control col-md-10','id'=>'brandname','placeholder'=>'品牌名称','required'=>'required', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandtime', '成立时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandtime', null, array('class' => 'form-control col-md-10','id'=>'brandtime','placeholder'=>'1970-1-1', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('province_id', '区域分类/省', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::select('province_id', [], null,array('class'=>'form-control select2'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('city_id', '区域分类/市', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::select('city_id', [], null,array('class'=>'form-control select2'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('genre', '公司性质', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::select('genre', ['民营企业'=>'民营企业','个体经营'=>'个体经营','股份制公司'=>'股份制公司','私营企业'], null,array('class'=>'form-control select2'))}}
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    {{Form::label('acreage', '所需面积', array('class' => 'col-sm-2 control-label'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::select('acreage', [], null,array('class'=>'form-control select2'))}}
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    {{Form::label('tzid', '店面投资', array('class' => 'col-sm-2 control-label'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::select('tzid', [], null,array('class'=>'form-control select2'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandpay', '投资金额', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandpay', null, array('class' => 'form-control col-md-10','id'=>'brandpay','placeholder'=>'请填写实际投资金额区间', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandduty', '是否区域授权', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::select('brandduty', ['否','是'], null,array('class'=>'form-control select2'))}}
                        {{Form::hidden('mid', '1', array('class' => 'form-control col-md-10','id'=>'mid'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandnum', '门店总数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandnum', null, array('class' => 'form-control col-md-10','id'=>'brandnum','placeholder'=>'门店总数', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandarea', '加盟区域', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandarea', null, array('class' => 'form-control col-md-10','id'=>'brandarea','placeholder'=>'加盟区域', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandmap', '经营范围', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandmap', null, array('class' => 'form-control col-md-10','id'=>'brandmap','placeholder'=>'经营范围', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandperson', '加盟人群', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandperson', null, array('class' => 'form-control col-md-10','id'=>'brandperson','placeholder'=>'加盟人群', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandattch', '加盟意向人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandattch', null, array('class' => 'form-control col-md-10','id'=>'brandattch','placeholder'=>'加盟意向人数', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandapply', '申请加盟人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandapply', null, array('class' => 'form-control col-md-10','id'=>'brandapply','placeholder'=>'申请加盟人数', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandchat', '项目咨询人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandchat', null, array('class' => 'form-control col-md-10','id'=>'brandchat','placeholder'=>'项目咨询人数', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandgroup', '公司名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandgroup', null, array('class' => 'form-control col-md-10','id'=>'brandgroup','placeholder'=>'公司名称', 'autocomplete'=>"off"))}}
                    </div>
                </div>

                <div class="form-group col-md-6">
                    {{Form::label('brandaddr', '公司地址', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandaddr', null, array('class' => 'form-control col-md-10','id'=>'brandaddr','placeholder'=>'公司地址','required'=>'required', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('registeredcapital', '注册资金', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('registeredcapital', null, array('class' => 'form-control col-md-10','id'=>'registeredcapital','placeholder'=>'注册资金', 'autocomplete'=>"off"))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('licenseno', '特许备案号', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('licenseno', null, array('class' => 'form-control col-md-10','id'=>'licenseno','placeholder'=>'特许备案号 如无可不填写', 'autocomplete'=>"off"))}}
                    </div>
                </div>
            </div>
        </div>
        <div class="timeline-footer">
            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
        </div>
    </div>
</li>
<!-- END timeline item -->