export const TaskComponentTypes = {
    Description: 'description',
} as const;

export type TaskComponentType =
    typeof TaskComponentTypes[keyof typeof TaskComponentTypes];

export const TaskTypes = {
    OneOff: 'one-off',
    Habit: 'habit',
    Repeating: 'repeating',
    Recurring: 'recurring'
} as const;

export type TaskType = typeof TaskTypes[keyof typeof TaskTypes];

export type TaskComponent = {
    id: string;
    task_type: TaskComponentType;
    sort_order: number;
    content: unknown;
};

export type Task = {
    id: string;
    title: string;
    completed: boolean;
    created_at: string;
    updated_at: string;
    components: TaskComponent[];
};

export type TaskDefinition = {
    id: string;
    title: string;
    created_at: string;
    updated_at: string;
    components: TaskComponent[];
}
