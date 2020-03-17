<?php
function findChildren($categories, $nodeId = null)
{
    $size = sizeof($categories);
    $children = [];
    for ($i = 0; $i < $size; $i++) {
        if ($categories[$i]['parentId'] == $nodeId) {
            array_push($children, $categories[$i]);
        }
    }
    return $children;
}

function findParent($categories, $idParent) {
    $parent = [
        'id'        => -1,
        'name'      => '-',
        'idParent'    => null
    ];
    $size = sizeof($categories);
    for ($i = 0; $i < $size; $i++) {
        $category = $categories[$i];
        if ($category['id'] == $idParent) {
            $parent = $category;
            break;
        }
    }
    return $parent;
}

function drawTree($categories, $node, $isRoot = false)
{
    // Start tree
    if ($isRoot) {
        echo '<ul class="root tree">';
    } else {
        echo '<ul class="tree">';
    }
    echo '<li class="item">' . $node['id'] . '. ' . $node['name'];
    // Draw children
    $children = findChildren($categories, $node['id']);
    $sizeChildren = sizeof($children);
    for ($i = 0; $i < $sizeChildren; $i++) {
        drawTree($categories, $children[$i]);
    }
    // End tree
    echo '</li>';
    echo '</ul>';
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Manage Categories</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <article class="main">
        <table class="tree-table">
            <tr class="title">
                <td>Tree List</td>
            </tr>
            <tr>
                <td>
                    <?php
                    $roots = findChildren($categories);
                    $sizeRoots = sizeof($roots);
                    for ($i = 0; $i < $sizeRoots; $i++) {
                        drawTree($categories, $roots[$i], true);
                    }
                    ?>
                </td>
            </tr>
        </table>
        <div class="content">
            <div class="create">
                <h3 class="title">Create Category</h3>
                <div class="component">
                    <div class="item select">
                        <span class="title">Parent</span>
                        <select name="">
                        <option value="null">None</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="item text">
                        <span class="title">Category</span>
                        <input type="text" name="">
                    </div>
                </div>
                <div class="submit">
                    <button type="button">Create / Save</button>
                </div>
            </div>
            <div class="list">
                <h3 class="title">List</h3>
                <table class="detail">
                    <tr class="title">
                        <th style="width: 7%">#ID</th>
                        <th style="width: 10%">Category Name</th>
                        <th style="width: 20%">Parent Name</th>
                        <th style="width: 39%">Children</th>
                        <th style="width: 7%"></th>
                        <th style="width: 7%"></th>
                    </tr>
                    <?php
                        $limit = 10; // Limit in one page
                        $index = ($page - 1)*$limit; // Start index
                        $size = $index + $limit; // End index
                        $sizeCategories = sizeof($categories);
                        for ($index; $index < $sizeCategories && $index < $size; $index++) {
                            $category = $categories[$index];
                            echo '<tr class="row">';
                            echo '<td style="width: 7%">'. $category['id'] .'</td>';
                            echo '<td style="width: 20%">'. $category['name'] .'</td>';
                            $parent = findParent($categories, $category['parentId']);
                            echo '<td style="width: 20%">'. $parent['name'] .'</td>';
                            // Create list children name
                            $strChildren = '';
                            $children = findChildren($categories, $category['id']);
                            $sizeChildren = sizeof($children);
                            for ($i = 0; $i < $sizeChildren; $i++) {
                                $child = $children[$i];
                                $strChildren .= $child['name'].', ';
                            }
                            $strChildren = substr($strChildren, 0, strlen($strChildren) - 2);
                            echo '<td style="width: 39%">'. $strChildren .'</td>';
                            echo '<td style="width: 7%"><a class="edit" href="#">Edit</a></td>';
                            echo '<td style="width: 7%"><a class="del" href="#">Delete</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
                <div class="pagination">
                    <?php
                        $numPage = ceil((float)sizeof($categories)/10);
                        for ($i =1; $i <= $numPage; $i++) {
                            echo '<span class="page"><a href="'. url('/categories/'.$i) .'">'. $i .'</a></span>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </article>
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>