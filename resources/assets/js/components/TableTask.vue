<template>
    <div class="q-tasks-list">
        <div class="g-column" v-if = '(group)'>
            <span class="text-column">Новая:</span>
            <draggable :list="firstGroup" :options="{animation:200, group:'new'}" :element="'ul'" @add="onAdd">
                <li class="g-task" v-for="(tasks) in firstGroup" :key="tasks.id" :data-id="tasks.id">
                    <a class="open-g-task js-show-q-view-task-admin-popup" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Я себе поручил:</div>
                            {{ tasks.title }}<div class="g-task-footer-urgency"></div></div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            {{ tasks.start_at + '  -  ' + tasks.finish_at  }}
                        </div>
                    </div>
                </li>
            </draggable>
        </div>
        <div class="g-column" v-if = '(group)'>
            <span class="text-column">В работе:</span>
            <draggable :list="secondGroup" :options="{animation:200, group:'new'}" :element="'ul'" @add="onAdd">
                <li class="g-task" v-for="(tasks) in secondGroup" :key="tasks.id" :data-id="tasks.id">
                    <a class="open-g-task" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Я поручил(а):</div>
                            {{ tasks.title }}</div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            {{ tasks.start_at + '  -  ' + tasks.finish_at  }}
                        </div>
                    </div>
                </li>
            </draggable>
        </div>
        <div class="g-column" v-if = '(group)'>
            <span class="text-column">Выполнено:</span>
            <draggable :list="thirdGroup" :options="{animation:200, group:'new'}" :element="'ul'" @add="onAdd">
                <li class="g-task g-task-ok" v-for="(tasks) in thirdGroup" :key="tasks.id" :data-id="tasks.id">
                    <a class="open-g-task" href="#">
                        <div class="g-task-header"><div class="g-task-header-name">Мне поручил Антон Иванович Иванов:</div>
                            {{ tasks.title }}<div class="g-task-footer-urgency"></div></div>
                    </a>
                    <div class="g-task-footer">
                        <div class="g-task-footer-date">
                            {{ tasks.start_at + '  -  ' + tasks.finish_at  }}
                        </div>
                    </div>
                </li>
            </draggable>
        </div>
    </div>
</template>

<script>

    import draggable from 'vuedraggable'

    export default {

        components: {
            draggable
        },

        data() {
            return {
                firstGroup : this.group[1],
                secondGroup : this.group[2],
                thirdGroup : this.group[3]
            }
        },

        props: ['group'],

        methods: {
            onAdd(event) {
                console.log(event.item);
            }

        }

    }

</script>
