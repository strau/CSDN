<template>
    <div>

        <el-menu default-active="1-4-1" class="el-menu sidebar-content" @open="handleOpen" @close="handleClose" :collapse="isCollapse">

                <el-menu-item @click="addTab({name:'index',title:'首页', route:'/admin/index', query:{}})">
                    <router-link class="menu-link" to="/admin/index">首页</router-link>
                </el-menu-item>

            <el-submenu v-for="(menu, index) in menus"
                        :key="index"
                        :index="index + ''">
                <template slot="title">
                    <i class="el-icon-location"></i>
                    <span slot="title">{{ menu.name}}</span>
                </template>
                <div v-if="menu.child.length !== 0">
                    <el-menu-item v-for="(sub_menu, sub_index) in menu.child"
                                  :key="sub_index"
                                  :index="index + '-' + sub_index"
                                  @click="addTab({name:sub_menu.id + '',title:sub_menu.name, route:sub_menu.route, query:sub_menu.query})">
                        <router-link class="menu-link" :to="sub_menu.route">{{ sub_menu.name }}</router-link>
                        <!--{{ sub_menu.name }}-->
                    </el-menu-item>
                </div>
            </el-submenu>
            <!--<el-submenu index="2">-->
                <!--<template slot="title">-->
                    <!--<i class="el-icon-location"></i>-->
                    <!--<span slot="title">导航一</span>-->
                <!--</template>-->
                    <!--<el-menu-item index="1-1" @click="addTab({name:'option1',title:'选项1', route:'/admin', query:{}})">-->
                        <!--<router-link to="/admin">选项1</router-link>-->
                    <!--</el-menu-item>-->
                    <!--<el-menu-item index="1-2" @click="addTab({name:'option2',title:'选项2', route:'/admin/main', query:{}})">选项2</el-menu-item>-->
            <!--</el-submenu>-->
            <!--<el-submenu index="3">-->
                <!--<template slot="title">-->
                    <!--<i class="el-icon-location"></i>-->
                    <!--<span slot="title">导航一</span>-->
                <!--</template>-->
                    <!--<el-menu-item index="1-1" @click="addTab({name:'option1',title:'选项1', route:'/admin', query:{}})">-->
                        <!--<router-link to="/admin">选项1</router-link>-->
                    <!--</el-menu-item>-->
                    <!--<el-menu-item index="1-2" @click="addTab({name:'option2',title:'选项2', route:'/admin/main', query:{}})">选项2</el-menu-item>-->
            <!--</el-submenu>-->
        </el-menu>
    </div>
</template>

<style>
    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: 200px;
        min-height: 400px;
    }
</style>

<script>
    export default {
        // data() {
        //     return {
        //         menus: [
        //             {
        //                 id:1,
        //                 name:'菜单一',
        //                 route:'',
        //                 child: [
        //                     {
        //                         id:2,
        //                         name:'子菜单1',
        //                         route:'/admin',
        //                         query:{}
        //                     },
        //                     {
        //                         id:3,
        //                         name:'子菜单2',
        //                         route:'/admin/main',
        //                         query:{}
        //                     },
        //                     {
        //                         id:4,
        //                         name:'子菜单2',
        //                         route:'/admin/main',
        //                         query:{}
        //                     },
        //                 ]
        //             }
        //         ]
        //     };
        // },
        methods: {
            handleOpen(key, keyPath) {
                // 菜单打开
            },
            handleClose(key, keyPath) {
                // 菜单折叠
            },
            addTab(tab) {
                this.$store.commit('addTab', tab);
            },
        },
        computed: {
            isCollapse: {
                get () {
                    return this.$store.state.layout.menu.isCollapse;
                },
                set () {}
            },
            menus: {
                get () {
                    return this.$store.state.layout.menu.menus;
                },
                set () {}
            }
        }
    }
</script>