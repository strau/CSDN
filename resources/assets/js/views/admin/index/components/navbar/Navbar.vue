<template>
    <div style="width: 100%;">
        <i @click="collapse" style="float:left" class="el-icon-menu"></i>
        <el-header style="text-align: right; font-size: 12px; height: 35px">
            <el-dropdown>
                <i class="el-icon-setting" style="margin-right: 15px"></i>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item>查看</el-dropdown-item>
                    <el-dropdown-item>新增</el-dropdown-item>
                    <el-dropdown-item>删除</el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
            <span>王小虎</span>
        </el-header>
    </div>
</template>
<script>
    export default {
        methods: {
            collapse () {
                this.$store.commit('collapse');
            }
        }
    }
</script>