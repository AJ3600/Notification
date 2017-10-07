<template>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-globe"></span>
            Notifications <span class="badge">{{ notifications.length }}</span> <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            <li v-for="notification in notifications">
                <a href="#" v-on:click="MarkAsRead(notification)">
                    SomeOne commented on your Post<br>
                    <small>{{ notification.data.post.title }}</small>
                </a>
            </li>
            <li v-if="notifications.length == 0">
                There is no new notifications
            </li>
        </ul>
    </li>
</template>

<script>
    export default {
        props: ['notifications'],
        methods: {
            MarkAsRead: function(notification) {
                var data = {
                    id: notification.id
                };
                axios.post('/notification/read', data).then(response => {
                    window.location.href = "/post/" + notification.data.post.id;
                });
            }
        }
    }
</script>
