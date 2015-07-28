@extends('base')

@section('content')
<div id="container">
    <div class="main-header clearfix">
        <div class="page-title">
            <h3 class="no-margin">Dashboard</h3>
            <span></span>
        </div><!-- /page-title -->

        <ul class="page-stats">
            <li>
                <div class="value">
                    <span>Total</span>
                    <h4 id="currentVisitor">4256</h4>
                </div>
                <span id="visits" class="sparkline"></span>
            </li>
            <li>
                <div class="value">
                    <span>Today</span>
                    <h4><strong id="currentBalance">256</strong></h4>
                </div>
                <span id="balances" class="sparkline"></span>
            </li>
        </ul><!-- /page-stats -->
    </div><!-- /main-header -->

    <div class="grey-container shortcut-wrapper">
        <a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-bar-chart-o"></i>
					</span>
            <span class="text">Statistic</span>
        </a>
        <a href="/posts" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-envelope-o"></i>
					</span>
            <span class="text">Posts</span>
        </a>
        <a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-user"></i>
					</span>
            <span class="text">Users</span>
        </a>
        <a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-globe"></i>
						<span class="shortcut-alert">
							7
						</span>
					</span>
            <span class="text">Notification</span>
        </a>
        <a href="#" class="shortcut-link">
					<span class="shortcut-icon">
						<i class="fa fa-cog"></i></span>
            <span class="text">Setting</span>
        </a>
    </div><!-- /grey-container -->

    @foreach ($all_posts as $group_id =>$posts)
    <div class=" content-padding">
            <div class="panel panel-default">
                <div class="panel-heading clearfix">
<!--                    <h4 class="headline">-->
<!--                        Basic Info-->
<!--                        <span class="line"></span>-->
<!--                    </h4>-->
                    <span class="pull-left"><a href="{{$groups[$group_id]->url}}" target="_blank"><i class="fa fa-bar-chart-o fa-lg"></i>{{$groups[$group_id]->name}}</a></span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
<!--                            <strong class="block">{{$groups[$group_id]->name}}</strong>-->
<!--                            <small class="text-muted">Updated: Oct 08,2013</small>-->
                            <h4 class="headline">
                                Tag Cloud
                                <span class="line"></span>
                            </h4>
                            <div class="panel panel-default">
                                <div id="vis{{$group_id}}"></div>
                            </div>

                            <h4 class="headline">
                                Keywords Monitor
                                <span class="line"></span>
                            </h4>
                            <p>每当小组内发布包含有关键字的帖子，确保会第一时间收到通知。</p>
                            <div class="input-group">
<!--                                <form class="form-inline no-margin" action="/keywords" method="post">-->
                                <input type="hidden" value="{{$group_id}}" name="gid" />
                                <input type="text" name="gid" class="form-control input-sm" placeholder="keyword1, keyword2...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-success" tabindex="-1">Submit</button>
                                </div> <!-- /input-group-btn -->
<!--                                </form>-->
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <h4 class="headline">
                                Today's Hot Posts
                                <small class="pull-right"><a href="/posts/{{$group_id}}"  target="_blank">More...</a></small>
                                <span class="line"></span>
                            </h4>
                            <div class="panel panel-default">
                                <div class="list-group">
                                    @foreach ($all_hot_posts[$group_id] as $post)
                                    <a class="list-group-item" href="{{$post->url}}" target="_blank" style="font-size: 10px">
                                        <span class="m-left-xs">{{$post->title}}</span>
                                        <span class="badge badge-warning">{{$post->response_num}}</span>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5 col-sm-12">
                            <h4 class="headline">
                                Posts History
                                <span class="line"></span>
                            </h4>
                            <div id="placeholder{{$group_id}}" class="graph" style="height:250px"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endforeach

    <div class="bg-white">
        <div class="text-center content-padding">
            <div class="container">

            </div>
        </div>
    </div>


    <div class="content-padding bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">

                </div>
                <div class="col-md-6 col-sm-6">
                    <div id="vis"></div>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection

@section('bottom_js')
<script src="js/d3/d3.js"></script>
<script src="js/d3.layout.cloud.js"></script>
<script>(function() {

        @foreach ($group_keywords as $group_id =>$keywords)
        var fill{{$group_id}} = d3.scale.category20();
        var layout{{$group_id}} = d3.layout.cloud()
            .size([350, 100])
            .words([
                @foreach ($keywords as $kw =>$count)
                    {"text":"{{ $kw }}","size":{{($count/$group_keywords_max_count[$group_id]) *40 }}},
                @endforeach
                ]
//                .map(function(d) {
//                    return {text: d, size: 10 + Math.random() * 90, test: "haha"};
//                })
            )
            .padding(2)
            .rotate(function() { return ~~(Math.random() * 2) * 0; })
            .font("Impact")
            .spiral("rectangular")
            .fontSize(function(d) { return d.size; })
            .on("end", draw{{$group_id}});
        layout{{$group_id}}.start();
        function draw{{$group_id}}(words) {
            d3.select("#vis{{$group_id}}").append("svg")
                .attr("width", layout{{$group_id}}.size()[0])
                .attr("height", layout{{$group_id}}.size()[1])
                .append("g")
                .attr("transform", "translate(" + layout{{$group_id}}.size()[0] / 2 + "," + layout{{$group_id}}.size()[1] / 2 + ")")
                .selectAll("text")
                .data(words)
                .enter().append("text")
                .style("font-size", function(d) { return d.size + "px"; })
                .style("font-family", "Impact")
                .style("fill", function(d, i) { return fill{{$group_id}}(i); })
                .attr("text-anchor", "middle")
                .attr("transform", function(d) {
                    return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                })
                .text(function(d) { return d.text; });
        }
        @endforeach
    })();
</script>

<script>
$(function	()	{
    //Flot Chart
    //Website traffic chart
    @foreach ($all_posts as $group_id =>$posts)
    var init{{$group_id}} = {
            data: [
                        @foreach ($posts as $index =>$node)
                            [{{$index}}, {{ $node->count }}],
                        @endforeach
            ],
            label: "Post"
        },
        options{{$group_id}} = {
            series: {
                lines: {
                    show: true,
                    fill: true,
                    fillColor: 'rgba(121,206,167,0.2)'
                },
                points: {
                    show: true,
                    radius: '4.5'
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            },
            xaxis: {
                ticks:[
                    @foreach ($posts as $index =>$node)
                        [{{$index}}, "{{ $node->date }}"],
                    @endforeach
                    ],
//                ticks: [[0, "zero"], [1, "one mark"], [2, "two marks"]]
            },
            colors: ["#37b494"]
        },
        plot{{$group_id}};

    plot{{$group_id}} = $.plot($('#placeholder{{$group_id}}'), [init{{$group_id}}], options{{$group_id}});


    $("<div id='tooltip{{$group_id}}'></div>").css({
        position: "absolute",
        display: "none",
        border: "1px solid #222",
        padding: "4px",
        color: "#fff",
        "border-radius": "4px",
        "background-color": "rgb(0,0,0)",
        opacity: 0.90
    }).appendTo("body");

    $("#placeholder{{$group_id}}").bind("plothover", function (event, pos, item) {

        var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";
        $("#hoverdata{{$group_id}}").text(str);

        if (item) {
            var x = item.datapoint[0],
                y = item.datapoint[1];

            $("#tooltip{{$group_id}}").html("Post : " + y)
                .css({top: item.pageY+5, left: item.pageX+5})
                .fadeIn(200);
        } else {
            $("#tooltip{{$group_id}}").hide();
        }
    });

//    $("#placeholder{{$group_id}}").bind("plotclick", function (event, pos, item) {
//        if (item) {
//            $("#clickdata{{$group_id}}").text(" - click point " + item.dataIndex + " in " + item.series.label);
//            plot{{$group_id}}.highlight(item.series, item.datapoint);
//        }
//    });

    var animate{{$group_id}} = function () {
        $('#placeholder{{$group_id}}').animate( {tabIndex: 0}, {
            duration: 3000,
            step: function ( now, fx ) {
                var r = $.map( init{{$group_id}}.data, function ( o ) {
                    return [[ o[0], o[1] * fx.pos ]];
                });

                plot{{$group_id}}.setData( [{ data: r }] );
                plot{{$group_id}}.draw();
            }
        });
    }

    animate{{$group_id}}();
    @endforeach
});
</script>
@endsection