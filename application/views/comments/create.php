<div class="row" style="height: 40px;"></div>
<div class="row">
    <div class="col">
        <h5><?php echo $title ?></h5>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php echo validation_errors(); ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <?php echo form_open(base_url().'comments/create') ?>
            <div class="row">
                <div class="col">
                    <input class="form-control border border-secondary text-center" type="text" placeholder="ФИО/Никнейм"/>
                </div>
                <div class="col">
                    <p>
                        <input id="mail" type="email" class="form-control border border-secondary text-center" name="email" placeholder="емаил"/>
                        <label id="valid"></label>
                    </p>
                </div>
                <div class="w-100" style="height: 10px;"></div>
            </div>

            <input style="display: none;" type="input" name="date"/>
            <div class="row">
                <div class="col">
                    <label id="validtext"></label>
                    <input id="content" class="form-control border border-secondary text-center" name="content" placeholder="текст комментария" style="height: 10rem;">
                </div>
                <div class="w-100" style="height: 10px;"></div>
            </div>
            <div class="row">
                <div class="col-auto mr-auto"></div>
                <div class="col-auto">
                    <input id="submit" class="btn btn-outline-secondary btn-lg pl-5 pr-5" type="submit" name="submit" value="Отправить" />
                </div>
                <div class="w-100" style="height: 40px;"></div>
            </div>
        </form>
    </div>
</div>

<?php if (isset($results)) { ?>

<?php foreach ($results as $dat):  ?>

<div class="w-100" style="height: 2px; border: 1px solid #c6c6c6;"></div>

<div class="row no-gutters">
    <div class="col-auto mr-auto">
        <p class="pt-3" style="">
            <?= $dat->nickname ?>
        </p>
    </div>
    <div class="col-auto">
        <p class="pt-3">
            <?= nice_date(unix_to_human($dat->date), 'd.m.Y') ?>
        </p>
    </div>
</div>
<div class="row">
    <div class="col">
        <p class="pb-3">
            <?= $dat->content ?>
        </p>
    </div>
</div>

<?php endforeach; ?>

<div class="row">
    <?php } else { ?>
        <div>No comment(s) found.</div>
    <?php } ?>
</div>
<?php if (isset($links)) { ?>
    <?php echo $links ?>
<?php } ?>
