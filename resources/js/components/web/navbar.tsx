import {
    Mail,
    MapPin,
    Menu,
    MessageCircleQuestionMark,
    MoveRight,
    Phone,
    Search,
} from "lucide-react";
import Flag from "../../../../public/images/flag.png";
import { Link } from "@inertiajs/react";
import Logo from "../../../../public/images/logo.png";
import {
    NavigationMenu,
    NavigationMenuContent,
    NavigationMenuItem,
    NavigationMenuLink,
    NavigationMenuList,
    NavigationMenuTrigger,
} from "@/components/ui/navigation-menu";
import TED from "../../../../public/images/departments/TED.png";
import CBA from "../../../../public/images/departments/CBA.png";
import CIT from "../../../../public/images/departments/CIT.png";
import { Button } from "@/components/ui/button";
import { Sheet, SheetContent } from "@/components/ui/sheet";
import {
    Accordion,
    AccordionContent,
    AccordionItem,
    AccordionTrigger,
} from "@/components/ui/accordion";
import {
    CommandDialog,
    CommandEmpty,
    CommandGroup,
    CommandInput,
    CommandItem,
    CommandList,
} from "@/components/ui/command";
import { useEffect, useState } from "react";

type SubItem = {
    name: string;
    href?: string;
    target: string;
    image?: string;
    link?: string;
};

type Item = {
    name: string;
    href?: string;
    subitems?: SubItem[];
};

const items: Item[] = [
    {
        name: "Home",
        href: route("home"),
    },
    {
        name: "Academic Programs",
        subitems: [
            {
                name: "Teacher Education Department",
                href: route("ted"),
                target: "_self",
                image: TED,
            },
            {
                name: "College of Business Administration",
                href: route("cba"),
                target: "_self",
                image: CBA,
            },
            {
                name: "College of Information Technology",
                href: route("cit"),
                target: "_self",
                image: CIT,
            },
        ],
    },
    {
        name: "Administrations",
        subitems: [
            {
                name: "Board of Trustees",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Administrative Officials and Unit Heads",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Academic Affairs",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Research and Extension",
                href: route("home"),
                target: "_self",
            },
            {
                name: "International Affairs and Linkages",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Student Development and Leadership",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Gender and Development",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Human Rights Education",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Information and Communication Technology",
                href: route("home"),
                target: "_self",
            },
            {
                name: "Culture and Arts",
                href: route("home"),
                target: "_self",
            },
        ],
    },
    {
        name: "News",
        href: route("news"),
    },
    {
        name: "SDG",
        href: route("sdg"),
    },
    {
        name: "Services",
        subitems: [
            {
                name: "Enrollment System",
                target: "_blank",
                link: "https://sis.occph.com/login",
            },
        ],
    },
];

export default function Navbar() {
    const [openSearch, setSearchOpen] = useState(false);
    const [openSidebar, setSidebarOpen] = useState(false);

    useEffect(() => {
        const down = (e: KeyboardEvent) => {
            if (e.key === "k" && (e.metaKey || e.ctrlKey)) {
                e.preventDefault();
                setSearchOpen((openSearch) => !openSearch);
            }
        };
        document.addEventListener("keydown", down);
        return () => document.removeEventListener("keydown", down);
    }, []);

    return (
        <>
            <div className="bg-slate-800 text-white">
                <div className="max-w-6xl mx-auto px-4 md:px-6 py-4 flex items-center justify-end md:justify-between">
                    <div className="hidden items-center gap-6 md:flex">
                        <a
                            href="#"
                            className="hover:text-blue-700 text-sm transition-colors"
                        >
                            Staff
                        </a>
                        <a
                            href="#"
                            className="hover:text-blue-700 text-sm transition-colors"
                        >
                            Alumni
                        </a>
                        <a
                            href="#"
                            className="hover:text-blue-700 text-sm transition-colors"
                        >
                            Faculty
                        </a>
                        <a
                            href="#"
                            className="hover:text-blue-700 text-sm transition-colors"
                        >
                            Community
                        </a>
                    </div>
                    <div className="flex items-center gap-4">
                        <div className="flex items-center gap-2">
                            <MessageCircleQuestionMark
                                strokeWidth={1.5}
                                className="size-5"
                            />
                            <a
                                href="#"
                                className="hover:text-blue-700 text-sm transition-colors"
                            >
                                FAQ
                            </a>
                        </div>
                        <div className="h-4 border-r-[1.5px] border-gray-300"></div>
                        <img
                            src={Flag}
                            alt="philippine-flag"
                            className="h-6 object-contain"
                        />
                    </div>
                </div>
            </div>
            <nav className="bg-white/70 max-md:backdrop-blur-md max-md:shadow-2xl max-md:sticky max-md:top-0 max-md:z-50">
                <div className="relative max-w-6xl mx-auto md:px-6 md:pt-6 md:pb-12 max-md:p-4 max-md:pb-5">
                    <div className="flex items-center justify-between">
                        <Link href={route("home")} className="shrink-0">
                            <img
                                src={Logo}
                                alt="occ-logo"
                                className="h-12 object-contain"
                            />
                        </Link>
                        <div className="hidden items-center gap-6 md:flex">
                            <div className="flex items-center gap-4">
                                <div className="border border-gray-300 p-2">
                                    <MapPin
                                        strokeWidth={1.5}
                                        className="size-5 text-blue-700"
                                    />
                                </div>
                                <div className="flex flex-col">
                                    <span className="text-gray-600 text-xs font-medium">
                                        Address
                                    </span>
                                    <a
                                        href="https://maps.app.goo.gl/88x9eRcWgGJrrc4i6"
                                        target="_blank"
                                        className="font-semibold text-sm hover:underline"
                                    >
                                        Poblacion, Opol, Misamis Oriental
                                    </a>
                                </div>
                            </div>
                            <div className="h-8 border-r-[1.5px] border-gray-300"></div>
                            <div className="flex items-center gap-4">
                                <div className="border border-gray-300 p-2">
                                    <Mail
                                        strokeWidth={1.5}
                                        className="size-5 text-blue-700"
                                    />
                                </div>
                                <div className="flex flex-col">
                                    <span className="text-gray-600 text-xs font-medium">
                                        Email
                                    </span>
                                    <a
                                        href="mailto:opolcommunitycollege@occ.edu.ph"
                                        target="_blank"
                                        className="font-semibold text-sm hover:underline"
                                    >
                                        opolcommunitycollege@occ.edu.ph
                                    </a>
                                </div>
                            </div>
                            <div className="h-8 border-r-[1.5px] border-gray-300"></div>
                            <div className="flex items-center gap-4">
                                <div className="border border-gray-300 p-2">
                                    <Phone
                                        strokeWidth={1.5}
                                        className="size-5 text-blue-700"
                                    />
                                </div>
                                <div className="flex flex-col">
                                    <span className="text-gray-600 text-xs font-medium">
                                        Phone Number
                                    </span>
                                    <a
                                        href="tel:+639152775842"
                                        target="_blank"
                                        className="font-semibold text-sm hover:underline"
                                    >
                                        +63 915 277 5842
                                    </a>
                                </div>
                            </div>
                        </div>
                        <Button
                            onClick={() => setSidebarOpen(true)}
                            variant="ghost"
                            size="icon"
                            className="md:hidden"
                        >
                            <Menu strokeWidth={1.5} />
                        </Button>
                    </div>
                    <div className="hidden absolute z-50 inset-x-0 -bottom-6 justify-center md:flex">
                        <div className="bg-gray-200 flex-1 flex items-center gap-6 mx-6">
                            <a href="#">
                                <button
                                    type="button"
                                    className="relative group inline-flex justify-center items-center gap-2 whitespace-nowrap bg-slate-800 px-5 py-3.5 tracking-wide transition-colors text-center text-white cursor-pointer"
                                >
                                    <span className="relative z-10">
                                        Get More Info
                                    </span>
                                    <MoveRight
                                        strokeWidth={1.5}
                                        className="relative z-10"
                                    />
                                    <span className="absolute left-0 top-0 h-full w-0 bg-blue-700 transition-all duration-500 ease-out group-hover:w-full"></span>
                                </button>
                            </a>
                            <div className="flex items-center gap-6">
                                {items.map((item, index) =>
                                    item.subitems ? (
                                        <NavigationMenu key={index}>
                                            <NavigationMenuList>
                                                <NavigationMenuItem>
                                                    <NavigationMenuTrigger className="bg-transparent hover:bg-transparent focus:bg-transparent data-[state=open]:text-accent-foreground data-[state=open]:bg-transparent data-[state=open]:hover:bg-transparent data-[state=open]:focus:bg-transparent p-0 font-medium text-base">
                                                        {item.name}
                                                    </NavigationMenuTrigger>
                                                    <NavigationMenuContent>
                                                        <div className="grid w-[350px] gap-2 p-4">
                                                            {item.subitems.map(
                                                                (
                                                                    subItem,
                                                                    subIndex
                                                                ) => (
                                                                    <NavigationMenuLink
                                                                        key={
                                                                            subIndex
                                                                        }
                                                                        asChild
                                                                        className={`flex items-center gap-2 text-sm hover:bg-muted p-2 rounded-lg`}
                                                                    >
                                                                        {subItem.link ? (
                                                                            <a
                                                                                href={
                                                                                    subItem.link
                                                                                }
                                                                                target={
                                                                                    subItem.target
                                                                                }
                                                                            >
                                                                                {subItem.image && (
                                                                                    <div className="shrink-0 size-10">
                                                                                        <img
                                                                                            src={
                                                                                                subItem.image
                                                                                            }
                                                                                            alt={
                                                                                                subItem.name
                                                                                            }
                                                                                            className="object-contain rounded-lg"
                                                                                        />
                                                                                    </div>
                                                                                )}
                                                                                <span className="font-medium text-base">
                                                                                    {
                                                                                        subItem.name
                                                                                    }
                                                                                </span>
                                                                            </a>
                                                                        ) : (
                                                                            <Link
                                                                                href={
                                                                                    subItem.href
                                                                                }
                                                                                target={
                                                                                    subItem.target
                                                                                }
                                                                            >
                                                                                {subItem.image && (
                                                                                    <div className="shrink-0 size-10">
                                                                                        <img
                                                                                            src={
                                                                                                subItem.image
                                                                                            }
                                                                                            alt={
                                                                                                subItem.name
                                                                                            }
                                                                                            className="object-contain rounded-lg"
                                                                                        />
                                                                                    </div>
                                                                                )}
                                                                                <span className="font-medium text-base">
                                                                                    {
                                                                                        subItem.name
                                                                                    }
                                                                                </span>
                                                                            </Link>
                                                                        )}
                                                                    </NavigationMenuLink>
                                                                )
                                                            )}
                                                        </div>
                                                    </NavigationMenuContent>
                                                </NavigationMenuItem>
                                            </NavigationMenuList>
                                        </NavigationMenu>
                                    ) : (
                                        <NavigationMenu key={index}>
                                            <NavigationMenuList>
                                                <NavigationMenuItem>
                                                    <NavigationMenuLink asChild>
                                                        <Link
                                                            href={item.href}
                                                            className="font-medium text-base"
                                                        >
                                                            {item.name}
                                                        </Link>
                                                    </NavigationMenuLink>
                                                </NavigationMenuItem>
                                            </NavigationMenuList>
                                        </NavigationMenu>
                                    )
                                )}
                            </div>
                            <button
                                onClick={() => setSearchOpen(true)}
                                type="button"
                                className="relative bg-gray-300 size-full flex items-center justify-between cursor-pointer"
                            >
                                <div className="flex items-center opacity-75 gap-1">
                                    <Search className="absolute left-4 top-1/2 size-5 -translate-y-1/2" />
                                    <span className="py-2 pl-14 pr-4">
                                        Search
                                    </span>
                                </div>
                                <span className="flex-none text-xs font-semibold opacity-75 pr-4">
                                    Ctrl + K
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>

            <Sheet open={openSidebar} onOpenChange={setSidebarOpen}>
                <SheetContent className="w-full overflow-y-auto">
                    <Accordion type="single" collapsible>
                        <div className="pt-20 flex flex-col gap-6">
                            {items.map((item, index) =>
                                item.subitems ? (
                                    <AccordionItem
                                        key={index}
                                        value={`item-${index}`}
                                        className="border-none"
                                    >
                                        <AccordionTrigger className="p-0 text-base font-normal focus:no-underline">
                                            {item.name}
                                        </AccordionTrigger>
                                        <AccordionContent className="flex flex-col gap-3 pt-3">
                                            {item.subitems.map(
                                                (subItem, subIndex) =>
                                                    subItem.link ? (
                                                        <a
                                                            key={subIndex}
                                                            href={subItem.link}
                                                            target={
                                                                subItem.target
                                                            }
                                                            onClick={() =>
                                                                setSidebarOpen(
                                                                    false
                                                                )
                                                            }
                                                        >
                                                            {subItem.name}
                                                        </a>
                                                    ) : (
                                                        <Link
                                                            key={subIndex}
                                                            href={subItem.href}
                                                            target={
                                                                subItem.target
                                                            }
                                                            onClick={() =>
                                                                setSidebarOpen(
                                                                    false
                                                                )
                                                            }
                                                        >
                                                            {subItem.name}
                                                        </Link>
                                                    )
                                            )}
                                        </AccordionContent>
                                    </AccordionItem>
                                ) : (
                                    <Link
                                        key={index}
                                        href={item.href}
                                        onClick={() => setSidebarOpen(false)}
                                    >
                                        {item.name}
                                    </Link>
                                )
                            )}
                        </div>
                    </Accordion>
                </SheetContent>
            </Sheet>

            <CommandDialog open={openSearch} onOpenChange={setSearchOpen}>
                <CommandInput placeholder="Search..." />
                <CommandList>
                    <CommandEmpty>No results found.</CommandEmpty>
                    {items.map((item, index) =>
                        item.subitems ? (
                            <CommandGroup key={index} heading={item.name}>
                                {item.subitems.map((subItem, subIndex) => (
                                    <CommandItem key={subIndex} asChild>
                                        {subItem.link ? (
                                            <a
                                                href={subItem.link}
                                                onClick={() =>
                                                    setSearchOpen(false)
                                                }
                                            >
                                                {subItem.name}
                                            </a>
                                        ) : (
                                            <Link
                                                href={subItem.href}
                                                onClick={() =>
                                                    setSearchOpen(false)
                                                }
                                            >
                                                {subItem.name}
                                            </Link>
                                        )}
                                    </CommandItem>
                                ))}
                            </CommandGroup>
                        ) : (
                            <CommandGroup key={index}>
                                <CommandItem asChild>
                                    <Link
                                        href={item.href}
                                        onClick={() => setSearchOpen(false)}
                                    >
                                        {item.name}
                                    </Link>
                                </CommandItem>
                            </CommandGroup>
                        )
                    )}
                </CommandList>
            </CommandDialog>
        </>
    );
}
