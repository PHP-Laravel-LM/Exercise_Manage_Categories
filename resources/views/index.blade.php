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
                    <ul class="root tree">
                        <li class="item">root</li>
                        <li class="item has-child">
                            Item 2
                            <ul class="tree">
                                <li class="item">Item 2 - Sub 1</li>
                                <li class="item">Item 2 - Sub 2</li>
                                <li class="item has-child">
                                    Item 2 - Sub 3
                                    <ul class="tree">
                                        <li class="item">Item 2 - Sub 3 - Sub 1</li>
                                        <li class="item">Item 2 - Sub 3 - Sub 2</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
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
                            <option value="Value 1">Value 1</option>
                            <option value="Value 2">Value 2</option>
                            <option value="Value 3">Value 3</option>
                            <option value="Value 4">Value 4</option>
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
                        <th>#ID</th>
                        <th>Category Name</th>
                        <th>Parent Name</th>
                        <th>Children</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                    <tr class="row">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a class="edit" href="#">Edit</a>
                        </td>
                        <td>
                            <a class="del" href="#">Delete</a>
                        </td>
                    </tr>
                </table>
                <div class="pagination">
                    <span class="page"><a href="#">1</a></span>
                    <span class="page"><a href="#">2</a></span>
                    <span class="page"><a href="#">3</a></span>
                </div>
            </div>
        </div>
    </article>
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>

</html>