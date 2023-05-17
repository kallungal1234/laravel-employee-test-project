<!DOCTYPE html>
<html lang="en">

<head>
    <title>Users</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        form.example input[type=text] {
            padding: 10px;
            font-size: 15px;
            border: 1px solid grey;
            float: left;
            width: 100%;
            background: #f1f1f1;
            border-radius: .2rem;
        }

        form.example::after {
            content: "";
            clear: both;
            display: table;
        }

        .card-body-bg {
            background-color: rgba(0, 0, 0, .03);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body card-body-bg">
                <h5>Search</h5>
                <div class="mb-3">
                    <form method="GET" class="example" action="<?php echo e(route('users.list.search')); ?>">
                        <div class="input-group">
                            <input type="search" id="search" required class="form-control rounded" name="search" value="<?php echo e($search ?? ''); ?>" placeholder="Search name/designation/department..." aria-label="Search" aria-describedby="search-addon" />
                          </div>
                    </form>

                </div>
                <div class="row" id="etable">
                    <?php if(isset($users) && !empty($users)): ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-sm-6 mb-3 p-0 emp-card" id="<?php echo e($user['dept']['name']); ?>">
                                <div class="card mb-3 mx-2 p-3 h-100">
                                    <div class="pl-3">
                                        <div class=""><?php echo e($user['name'] ?? ''); ?></div>
                                        <div class="name"><?php echo e($user['dept']['name'] ?? ''); ?></div>
                                        <div class=""><?php echo e($user['designation']['name'] ?? ''); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div class="col text-center">No records avilable</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    if ($('#search').val().length !== 0) {
        // sortByDateAsc();
    }

    // sort table by ascending order
    function sortByDateAsc() {
        var rowval = document.querySelector("#etable");
        var cards = [].slice.call(rowval.querySelectorAll(".emp-card"));
        rowsList = cards.sort(function(a, b) {
            //Comparing for strings instead of numbers
            return a.id.localeCompare(b.id);
        });
        cards.forEach(function(v) {
            rowval.appendChild(v); // note that .appendChild() *moves* elements
        });
    }
</script>
</html>
<?php /**PATH C:\xampp\htdocs\my-project\resources\views/users/index.blade.php ENDPATH**/ ?>