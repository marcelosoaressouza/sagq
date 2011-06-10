<script type="text/javascript">
Raphael.fn.connection = function (obj1, obj2, line, bg) {
    if (obj1.line && obj1.from && obj1.to) {
        line = obj1;
        obj1 = line.from;
        obj2 = line.to;
    }
    var bb1 = obj1.getBBox(),
        bb2 = obj2.getBBox(),
        p = [{x: bb1.x + bb1.width / 2, y: bb1.y - 1},
        {x: bb1.x + bb1.width / 2, y: bb1.y + bb1.height + 1},
        {x: bb1.x - 1, y: bb1.y + bb1.height / 2},
        {x: bb1.x + bb1.width + 1, y: bb1.y + bb1.height / 2},
        {x: bb2.x + bb2.width / 2, y: bb2.y - 1},
        {x: bb2.x + bb2.width / 2, y: bb2.y + bb2.height + 1},
        {x: bb2.x - 1, y: bb2.y + bb2.height / 2},
        {x: bb2.x + bb2.width + 1, y: bb2.y + bb2.height / 2}],
        d = {}, dis = [];
    for (var i = 0; i < 4; i++) {
        for (var j = 4; j < 8; j++) {
            var dx = Math.abs(p[i].x - p[j].x),
                dy = Math.abs(p[i].y - p[j].y);
            if ((i == j - 4) || (((i != 3 && j != 6) || p[i].x < p[j].x) && ((i != 2 && j != 7) || p[i].x > p[j].x) && ((i != 0 && j != 5) || p[i].y > p[j].y) && ((i != 1 && j != 4) || p[i].y < p[j].y))) {
                dis.push(dx + dy);
                d[dis[dis.length - 1]] = [i, j];
            }
        }
    }
    if (dis.length == 0) {
        var res = [0, 4];
    } else {
        res = d[Math.min.apply(Math, dis)];
    }
    var x1 = p[res[0]].x,
        y1 = p[res[0]].y,
        x4 = p[res[1]].x,
        y4 = p[res[1]].y;
    dx = Math.max(Math.abs(x1 - x4) / 2, 10);
    dy = Math.max(Math.abs(y1 - y4) / 2, 10);
    var x2 = [x1, x1, x1 - dx, x1 + dx][res[0]].toFixed(3),
        y2 = [y1 - dy, y1 + dy, y1, y1][res[0]].toFixed(3),
        x3 = [0, 0, 0, 0, x4, x4, x4 - dx, x4 + dx][res[1]].toFixed(3),
        y3 = [0, 0, 0, 0, y1 + dy, y1 - dy, y4, y4][res[1]].toFixed(3);
    var path = ["M", x1.toFixed(3), y1.toFixed(3), "C", x2, y2, x3, y3, x4.toFixed(3), y4.toFixed(3)].join(",");
    if (line && line.line) {
        line.bg && line.bg.attr({path: path});
        line.line.attr({path: path});
    } else {
        var color = typeof line == "string" ? line : "#000";
        return {
            bg: bg && bg.split && this.path(path).attr({stroke: bg.split("|")[0], fill: "none", "stroke-width": bg.split("|")[1] || 3}),
            line: this.path(path).attr({stroke: color, fill: "none"}),
            from: obj1,
            to: obj2
        };
    }
};

</script>
<?php
    $x = 200;
    $y = 10;
    $size = 400;
    $process_info = '';
    $requirement_info = '';
    
    $flowchart = 'window.onload = function () ';
    $flowchart .= '{ ';
    $flowchart .= 'var dragger = function () { ';
    $flowchart .= 'this.ox = this.type == "rect" ? this.attr("x") : this.attr("cx"); ';
    $flowchart .= 'this.oy = this.type == "rect" ? this.attr("y") : this.attr("cy"); ';
    $flowchart .= 'this.animate({"fill-opacity": .2}, 500); ';
    $flowchart .= '}, ';
    $flowchart .= 'move = function (dx, dy) { ';
    $flowchart .= 'var att = this.type == "rect" ? {x: this.ox + dx, y: this.oy + dy} : {cx: this.ox + dx, cy: this.oy + dy}; ';
    $flowchart .= 'this.attr(att); ';
    $flowchart .= 'for (var i = connections.length; i--;) { ';
    $flowchart .= 'r.connection(connections[i]); ';
    $flowchart .= '} ';
    $flowchart .= 'r.safari(); ';
    $flowchart .= '}, ';
    $flowchart .= 'up = function () { ';
    $flowchart .= 'this.animate({"fill-opacity": 0}, 500); ';
    $flowchart .= '}, ';
    
    $flowchart .= 'r = Raphael("holder", 800, 800), ';
    $flowchart .= ' connections = [], ';
    $flowchart .= ' shapes = [ ';
    
    $flowchart .= 'r.rect('.$x.', '.$y.', '.$size.', 80, 10).attr({ stroke: "#000", fill: "#f00", href: "/process/'.$model->id.'", id: "box", class: "box"}), ';
    
    if (count($model->processes) > 0) 
    {
        $process_info = '('.count($model->processes).') '.Yii::t('sagq', 'Child Process');
    }
    
    if (count($model->requirements) > 0) 
    {
        $requirement_info = '('.count($model->requirements).') '.Yii::t('sagq', 'requirements');
    }
        
    $flowchart .= 'r.text('.($x + ($size / 2)).','.($y + 40).', "'.Yii::app()->CleanHTML->cleanAll($model->title, 64).'\n'.$process_info.'\n'.$requirement_info.'").attr({title: "'.$model->title.'", href: "/process/'.$model->id.'", class: "box", font: "12px Fontin-Sans, Arial"}), ';
    
    if (!empty($model->processes))
    {
        $j = 120;
        
        foreach($model->processes as $process)
        {
            if (count($process->requirements) > 0) 
            {
                $requirement_info = '('.count($process->requirements).') '.Yii::t('sagq', 'requirements');
            }
            
            $flowchart .= 'r.rect('.($x).', '.($y + $j).', '.($size / 2).', 80, 10).attr({title: "'.$process->title.'", stroke: "#000", fill: "#F9BC0A", href: "/process/'.$process->id.'"}), ';
            $flowchart .= 'r.text('.($x + ($size / 2 / 2)).','.($y + $j + 40).', "'.Yii::app()->CleanHTML->cleanAll($process->title, 32).'\n'.$requirement_info.'").attr({font: "12px Fontin-Sans, Arial", title: "'.$process->title.'", href: "/process/'.$process->id.'"}), ';
            
            $j = $j + 120;
        }
    }
            
    $flowchart .= ']; ';
    
//    $flowchart .= 'for (var i = 0, ii = shapes.length; i < ii; i++) { ';
//    $flowchart .= 'shapes[i].drag(move, dragger, up); ';
//    $flowchart .= '} ';

    
    if (count($model->processes) > 0) {
        $i = 2;
        foreach ($model->processes as $process)
        {
            $flowchart .= ' connections.push(r.connection(shapes[0], shapes['.$i.'], "#000")); ';
            $i = $i + 2;
        }
    }
    
    $flowchart .= '}; ';
    
    Yii::app()->clientScript->registerScript('flowchart', $flowchart);

?>

<div id="holder"></div>
