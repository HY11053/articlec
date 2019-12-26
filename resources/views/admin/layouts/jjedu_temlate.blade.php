<li>
    <i class="fa fa-user bg-yellow"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

        <h3 class="timeline-header"><a href="#">产品信息</a> 产品信息描述</h3>

        <div class="timeline-body">
            <div class="row">
                <div class="form-group col-md-6">
                    {{Form::label('brandname', '品牌名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandname',null, array('class' => 'form-control col-md-10','id'=>'brandname','placeholder'=>'品牌名称','required'=>'required'))}}
                    </div>
                </div>

                <div class="form-group col-md-6">
                    {{Form::label('brandtime', '成立时间', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandtime', null, array('class' => 'form-control col-md-10','id'=>'brandtime','placeholder'=>'1970-1-1'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandorigin', '品牌发源地', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandorigin', null, array('class' => 'form-control col-md-10','id'=>'brandorigin','placeholder'=>'品牌发源地'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandnum', '门店总数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandnum', rand(50,500), array('class' => 'form-control col-md-10','id'=>'brandnum','placeholder'=>'门店总数'))}}
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
                        {{Form::text('brandpay', null, array('class' => 'form-control col-md-10','id'=>'brandpay','placeholder'=>'请填写实际投资金额区间'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandarea', '加盟区域', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandarea', null, array('class' => 'form-control col-md-10','id'=>'brandarea','placeholder'=>'加盟区域'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandmap', '经营范围', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandmap', null, array('class' => 'form-control col-md-10','id'=>'brandmap','placeholder'=>'经营范围'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandperson', '加盟人群', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandperson', null, array('class' => 'form-control col-md-10','id'=>'brandmap','placeholder'=>'加盟人群'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandattch', '加盟意向人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandattch', rand(1000,3000), array('class' => 'form-control col-md-10','id'=>'brandattch','placeholder'=>'加盟意向人数'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandapply', '申请加盟人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandapply', rand(2000,5000), array('class' => 'form-control col-md-10','id'=>'brandapply','placeholder'=>'申请加盟人数'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandchat', '项目咨询人数', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandchat', rand(500,1000), array('class' => 'form-control col-md-10','id'=>'brandchat','placeholder'=>'项目咨询人数'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandgroup', '公司名称', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandgroup', null, array('class' => 'form-control col-md-10','id'=>'brandgroup','placeholder'=>'公司名称'))}}
                    </div>
                </div>

                <div class="form-group col-md-6">
                    {{Form::label('brandaddr', '公司地址', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandaddr', null, array('class' => 'form-control col-md-10','id'=>'brandaddr','placeholder'=>'公司地址','required'=>'required'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('genre', '公司性质', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('genre', null, array('class' => 'form-control col-md-10','id'=>'genre','placeholder'=>'公司性质'))}}
                    </div>
                </div>
                <div class="form-group col-md-6 ">
                    {{Form::label('acreage', '所需面积', array('class' => 'col-sm-2 control-label'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::select('acreage', [], null,array('class'=>'form-control select2'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('brandduty', '是否区域授权', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('brandduty', null, array('class' => 'form-control col-md-10','id'=>'brandduty','placeholder'=>'是否区域授权'))}}
                        {{Form::hidden('mid', '1', array('class' => 'form-control col-md-10','id'=>'mid'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('registeredcapital', '注册资金', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('registeredcapital', null, array('class' => 'form-control col-md-10','id'=>'registeredcapital','placeholder'=>'注册资金'))}}
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
<!-- timeline item -->
<li>
    <i class="fa   fa-recycle bg-yellow"></i>

    <div class="timeline-item">
        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

        <h3 class="timeline-header"><a href="#">店铺成本</a> 店铺各项成本开支</h3>

        <div class="timeline-body">
            <div class="row">
                <div class="form-group col-md-6">
                    {{Form::label('decorationpay', '装修费用', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('decorationpay',mt_rand (20000,50000), array('class' => 'form-control col-md-10','id'=>'decorationpay','placeholder'=>'装修费用'))}}
                    </div>
                </div>

                <div class="form-group col-md-6">
                    {{Form::label('quartersrent', '前两季度房租', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('quartersrent', mt_rand (2000,5000), array('class' => 'form-control col-md-10','id'=>'quartersrent','placeholder'=>'前两季度房租'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('equipmentcost', '铺货/设备费用', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('equipmentcost', mt_rand (10000,20000), array('class' => 'form-control col-md-10','id'=>'equipmentcost','placeholder'=>'铺货/设备费用'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('workingcapital', '流动资金', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('workingcapital', 20000, array('class' => 'form-control col-md-10','id'=>'workingcapital','placeholder'=>'流动资金'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('laborquarter', '人工开支', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('laborquarter', mt_rand (2000,5000), array('class' => 'form-control col-md-10','id'=>'laborquarter','placeholder'=>'一季度人工开支'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('miscellaneous', '工商税务杂项', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('miscellaneous', mt_rand (2000,5000), array('class' => 'form-control col-md-10','id'=>'miscellaneous','placeholder'=>'工商税务杂项'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('dailyvolume', '日成交量', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('dailyvolume', mt_rand (80,100), array('class' => 'form-control col-md-10','id'=>'dailyvolume','placeholder'=>'日成交量'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('unitprice', '平均单价', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('unitprice', mt_rand (50,100), array('class' => 'form-control col-md-10','id'=>'unitprice','placeholder'=>'平均单价'))}}
                    </div>
                </div>
                <div class="form-group col-md-6">
                    {{Form::label('watercoal', '水电煤(元/月)', array('class' => 'control-label col-md-2 col-sm-3 col-xs-12'))}}
                    <div class="col-md-8 col-sm-9 col-xs-12">
                        {{Form::text('watercoal', mt_rand (200,500), array('class' => 'form-control col-md-10','id'=>'watercoal','placeholder'=>'水电煤(元/月)'))}}
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