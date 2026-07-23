import { BookText, CheckCheck, CodeXml, LayoutGrid } from 'lucide-vue-next';
import { dashboard } from '@/routes';
import { list as listDefinitions } from '@/routes/definitions';
import { list as listInstances } from '@/routes/instances';
import type { NavItem } from '@/types';

export const mainNavItems : NavItem[] = [
    {
        title: 'Dashboard',
        href: dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Tasks',
        href: listInstances(),
        icon: CheckCheck,
    },
    {
        title: 'Definitions',
        href: listDefinitions(),
        icon: BookText,
    },
    {
        title: 'DevController',
        href: dashboard(),
        icon: CodeXml,
    },
]

export const footerNavItems: NavItem[] = [
    // {
    //     title: 'Repository',
    //     href: 'https://github.com/laravel/vue-starter-kit',
    //     icon: FolderGit2,
    // },
    // {
    //     title: 'Documentation',
    //     href: 'https://laravel.com/docs/starter-kits#vue',
    //     icon: BookOpen,
    // },
];
