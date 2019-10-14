<template>
    <div>
        <el-container style="width: 100%; border: 1px solid #eee">
            <Sidebar />
                <div style="width: 100%">
                    <!--<router-link to="/admin/test2">test2</router-link>-->
                    <!--<router-link to="/admin/test3">test3</router-link>-->
                    <Navbar />
                    <TagsView />
                    <router-view />
                </div>
        </el-container>
    </div>
</template>

<script>
    import Navbar from './components/navbar/Navbar'
    import Sidebar from './components/sidebar/Sidebar'
    import TagsView from './components/tags_view/TagsView'
    import {AdminIndex} from '../../../api/admin_api'

    export default {
        name : 'Layout',
        components: {
            Navbar,
            Sidebar,
            TagsView
        },
        methods: {
            // 获取首页展示数据
            getIndex () {
                AdminIndex().then(res => {
                    if (res.code === '00000') {
                        // 修改(菜单、用户等)首页显示数据
                        this.$store.commit('updateLayoutMenusAndUser', {menus:res.data.menus, user:res.data.user});
                    }
                });
            }
        },
        mounted () {
            this.getIndex();
        }
    }
</script>