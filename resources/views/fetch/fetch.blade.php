<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
{{--    <link rel="stylesheet" href="stil.css" />--}}
</head>
<body class="bg-info">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="display-3 text-center">JSON CRUD</h3>
            <table class="table table-dark text-center table-striped">
                <thead>
                <tr>
                    <th>name</th>
                    <th>category_id</th>
                    <th>description</th>
                    <th>brands_id</th>
                    <th>slug</th>
                    <th>islemler</th>
                </tr>
                </thead>
                <tbody id="productTable">
{{--                <tr>--}}
{{--                  <td>Mehmet</td>--}}
{{--                  <td>Elbeyli</td>--}}
{{--                  <td>mehmetelbeyli@mehmet.com</td>--}}
{{--                  <td>--}}
{{--                    <button class="btn btn-warning">Güncelle</button>--}}
{{--                    <button class="btn btn-danger">Sil</button>--}}
{{--                  </td>--}}
{{--                </tr>--}}
                </tbody>
            </table>


            <form class="row">
                <div class="col-md-2">
                    <input
                        class="form-control"
                        type="text"
                        id="name"
                        placeholder="name"
                    />
                </div>
                <div class="col-md-2">
                    <input
                        class="form-control"
                        type="text"
                        id="category_id"
                        placeholder="category_id"
                    />
                </div>
                <div class="col-md-2">
                    <input
                        class="form-control"
                        type="text"
                        id="description"
                        placeholder="description"
                    />
                </div>
                <div class="col-md-2">
                    <input
                        class="form-control"
                        type="text"
                        id="brands_id"
                        placeholder="brands_id"
                    />
                </div>
                <div class="col-md-2">
                    <input
                        class="form-control"
                        type="text"
                        id="slug"
                        placeholder="slug"
                    />
                </div>
                <div class="col-md-2">
                    <a class="btn btn-success" onclick="createUser()"
                    >Oluştur</a
                    >
{{--                    <a class="btn btn-primary" onclick="refreshTable()"> Yenile </a>--}}
                </div>
            </form>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>

<script src="custom.js"></script>
</body>
</html>
