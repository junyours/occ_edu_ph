import { Button } from "@/components/ui/button";
import { Input } from "@/components/ui/input";
import AppLayout from "@/layouts/app-layout";
import { PageProps } from "@/types";
import { router, useForm, usePage } from "@inertiajs/react";
import { debounce } from "lodash";
import { Loader2, MoreHorizontal, Pencil, Plus, Trash } from "lucide-react";
import { ReactPortal, useState } from "react";
import { toast } from "sonner";
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from "@/components/ui/table";
import {
    Pagination,
    PaginationContent,
    PaginationItem,
    PaginationLink,
    PaginationNext,
    PaginationPrevious,
} from "@/components/ui/pagination";
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuLabel,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from "@/components/ui/dropdown-menu";
import { cn } from "@/lib/utils";
import {
    Sheet,
    SheetContent,
    SheetFooter,
    SheetHeader,
    SheetTitle,
} from "@/components/ui/sheet";
import { Label } from "@/components/ui/label";
import InputError from "@/components/input-error";
import { Badge } from "@/components/ui/badge";
import MultiSelect from "@/components/multi-select";
import { Textarea } from "@/components/ui/textarea";
import DatePicker from "@/components/date-picker";
import {
    AlertDialog,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from "@/components/ui/alert-dialog";

interface Option {
    value: string;
    label: string;
}

interface Sdg {
    id: number;
    name: string;
}

interface News {
    id: number | null;
    title: string;
    description: string;
    date: Date | null;
    image: File | null;
    sdg: Sdg[];
}

interface Props extends PageProps {
    search: string | undefined;
    options: Option[];
    news: {
        data: News[];
        current_page: number;
        last_page: number;
    };
}

export default function News() {
    const { search, options, news } = usePage<Props>().props;
    const { data, setData, post, processing, errors, clearErrors } = useForm<{
        id: number | null;
        title: string;
        description: string;
        date: Date | null;
        image: File | null;
        sdg: Option[];
    }>({
        id: null,
        title: "",
        description: "",
        date: null,
        image: null,
        sdg: [],
    });
    const [open, setOpen] = useState(false);
    const [edit, setEdit] = useState(false);
    const [initialData, setInitialData] = useState<{
        id: number | null;
        title: string;
        description: string;
        date: Date | null;
        image: File | null;
        sdg: Option[];
    }>();
    const [showConfirmClose, setShowConfirmClose] = useState(false);
    const [showDelete, setShowDelete] = useState<{
        id: number | null;
        title: string;
        show: boolean;
    }>({
        id: null,
        title: "",
        show: false,
    });
    const [loadingDelete, setLoadingDelete] = useState(false);

    const handleOpen = (edit = false, news: News | null = null) => {
        clearErrors();
        setEdit(edit);

        if (edit && news) {
            const currentData = {
                id: news.id,
                title: news.title,
                description: news.title,
                date: news.date ? new Date(news.date) : null,
                image: null,
                sdg: news.sdg.map((s) => ({
                    value: String(s.id),
                    label: s.name,
                })),
            };
            setData(currentData);
            setInitialData(currentData);
        } else {
            const newData = {
                id: null,
                title: "",
                description: "",
                date: null,
                image: null,
                sdg: [],
            };
            setData(newData);
            setInitialData(newData);
        }

        setOpen(!open);
    };

    const handleSearch = debounce((value: string) => {
        router.get(
            "/admin/news",
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 1000);

    const hasUnsavedChanges = () => {
        return JSON.stringify(data) !== JSON.stringify(initialData);
    };

    const handleAdd = () => {
        clearErrors();
        post("/admin/news/add", {
            onSuccess: () => {
                handleOpen();
                toast.success("News created successfully.");
            },
            preserveState: true,
            preserveScroll: true,
        });
    };

    const handleUpdate = () => {
        clearErrors();
        post("/admin/news/update", {
            onSuccess: () => {
                handleOpen();
                toast.success("News updated successfully.");
            },
            preserveState: true,
            preserveScroll: true,
        });
    };

    const handleDelete = () => {
        setLoadingDelete(true);
        clearErrors();
        router.post(
            "/admin/news/delete",
            { id: showDelete.id },
            {
                onSuccess: () => {
                    toast.success("News deleted successfully.");
                },
                onFinish: () => {
                    setLoadingDelete(false);
                    setShowDelete({
                        id: null,
                        title: "",
                        show: false,
                    });
                },
                preserveState: true,
                preserveScroll: true,
            }
        );
    };

    return (
        <>
            <div className="space-y-4">
                <div className="flex items-center justify-between gap-4">
                    <Input
                        defaultValue={search}
                        onChange={(e) => handleSearch(e.target.value)}
                        className="max-w-xs"
                        placeholder="Search..."
                        type="search"
                    />
                    <Button onClick={() => handleOpen()}>
                        <Plus />
                        Create
                    </Button>
                </div>
                <Table>
                    <TableHeader>
                        <TableRow>
                            <TableHead></TableHead>
                            <TableHead>Title</TableHead>
                            <TableHead>SDG's</TableHead>
                            <TableHead>Date</TableHead>
                            <TableHead className="text-right"></TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        {news.data.map((news) => (
                            <TableRow key={news.id}>
                                <TableCell>
                                    <div className="size-12">
                                        <img
                                            src={`https://lh3.googleusercontent.com/d/${news.image}`}
                                            alt={news.title}
                                            className="size-full object-contain"
                                        />
                                    </div>
                                </TableCell>
                                <TableCell>{news.title}</TableCell>
                                <TableCell className="space-x-1.5">
                                    {news.sdg.map((sdg) => (
                                        <Badge key={sdg.id} variant="secondary">
                                            {sdg.name}
                                        </Badge>
                                    ))}
                                </TableCell>
                                <TableCell>
                                    {news.date
                                        ? new Date(
                                              news.date
                                          ).toLocaleDateString("en-US", {
                                              year: "numeric",
                                              month: "long",
                                              day: "numeric",
                                          })
                                        : ""}
                                </TableCell>
                                <TableCell className="text-right">
                                    <DropdownMenu>
                                        <DropdownMenuTrigger asChild>
                                            <Button
                                                variant="ghost"
                                                className="size-8 p-0"
                                            >
                                                <MoreHorizontal />
                                            </Button>
                                        </DropdownMenuTrigger>
                                        <DropdownMenuContent className="mr-4">
                                            <DropdownMenuLabel>
                                                Actions
                                            </DropdownMenuLabel>
                                            <DropdownMenuSeparator />
                                            <DropdownMenuItem
                                                onClick={() =>
                                                    handleOpen(true, news)
                                                }
                                                className="text-primary"
                                            >
                                                <Pencil />
                                                Edit
                                            </DropdownMenuItem>
                                            <DropdownMenuItem
                                                onClick={() =>
                                                    setShowDelete({
                                                        id: news.id,
                                                        title: news.title,
                                                        show: true,
                                                    })
                                                }
                                                className="text-destructive"
                                            >
                                                <Trash />
                                                Delete
                                            </DropdownMenuItem>
                                        </DropdownMenuContent>
                                    </DropdownMenu>
                                </TableCell>
                            </TableRow>
                        ))}
                    </TableBody>
                </Table>
                <Pagination className="justify-end">
                    <PaginationContent>
                        <PaginationItem>
                            <PaginationPrevious
                                className={cn(
                                    "cursor-default",
                                    news.current_page > 1
                                        ? ""
                                        : "pointer-events-none opacity-50"
                                )}
                                onClick={() =>
                                    news.current_page > 1 &&
                                    router.get(
                                        "/admin/news",
                                        {
                                            page: news.current_page - 1,
                                            search: search ?? "",
                                        },
                                        { preserveState: true }
                                    )
                                }
                            />
                        </PaginationItem>
                        {Array.from(
                            { length: news.last_page },
                            (_, i) => i + 1
                        ).map((page) => (
                            <PaginationItem key={page}>
                                <PaginationLink
                                    isActive={page === news.current_page}
                                    onClick={(e) => {
                                        e.preventDefault();
                                        router.get(
                                            "/admin/news",
                                            { page, search: search ?? "" },
                                            { preserveState: true }
                                        );
                                    }}
                                    className="cursor-default"
                                >
                                    {page}
                                </PaginationLink>
                            </PaginationItem>
                        ))}
                        <PaginationItem>
                            <PaginationNext
                                className={cn(
                                    "cursor-default",
                                    news.current_page < news.last_page
                                        ? ""
                                        : "pointer-events-none opacity-50"
                                )}
                                onClick={() =>
                                    news.current_page < news.last_page &&
                                    router.get(
                                        "/admin/news",
                                        {
                                            page: news.current_page + 1,
                                            search: search ?? "",
                                        },
                                        { preserveState: true }
                                    )
                                }
                            />
                        </PaginationItem>
                    </PaginationContent>
                </Pagination>
            </div>

            <Sheet
                open={open}
                onOpenChange={(val) => {
                    if (!processing) {
                        if (!val && hasUnsavedChanges()) {
                            setShowConfirmClose(true);
                        } else {
                            setOpen(val);
                        }
                    }
                }}
            >
                <SheetContent className="flex flex-col">
                    <SheetHeader>
                        <SheetTitle>{edit ? "Edit" : "Create"} News</SheetTitle>
                    </SheetHeader>
                    <div className="flex-1 overflow-y-auto space-y-4 p-2">
                        <div className="grid w-full max-w-sm items-center gap-2">
                            <Label>SDG's</Label>
                            <MultiSelect
                                options={options}
                                selected={data.sdg}
                                onChange={(sdg) => setData("sdg", sdg)}
                            />
                            <InputError message={errors.sdg} />
                        </div>
                        <div className="grid w-full max-w-sm items-center gap-2">
                            <Label>Image</Label>
                            <Input
                                onChange={(e) => {
                                    const file = e.target.files?.[0] ?? null;
                                    setData("image", file);
                                }}
                                accept=".jpg,.jpeg,.png"
                                type="file"
                            />
                            <InputError message={errors.image} />
                        </div>
                        <div className="grid w-full max-w-sm items-center gap-2">
                            <Label>Title</Label>
                            <Input
                                value={data.title}
                                onChange={(e) =>
                                    setData("title", e.target.value)
                                }
                            />
                            <InputError message={errors.title} />
                        </div>
                        <div className="grid w-full max-w-sm items-center gap-2">
                            <Label>Description</Label>
                            <Textarea
                                value={data.description}
                                onChange={(e) =>
                                    setData("description", e.target.value)
                                }
                            />
                            <InputError message={errors.description} />
                        </div>
                        <div className="grid w-full max-w-sm items-center gap-2">
                            <Label>Date</Label>
                            <DatePicker
                                value={data.date ?? undefined}
                                onChange={(date) =>
                                    setData("date", date ?? null)
                                }
                            />
                            <InputError message={errors.date} />
                        </div>
                    </div>
                    <SheetFooter>
                        <Button
                            onClick={() => {
                                if (!processing) {
                                    if (hasUnsavedChanges()) {
                                        setShowConfirmClose(true);
                                    } else {
                                        setOpen(false);
                                    }
                                }
                            }}
                            variant="ghost"
                            disabled={processing}
                        >
                            Cancel
                        </Button>
                        <Button
                            onClick={edit ? handleUpdate : handleAdd}
                            disabled={processing}
                        >
                            {processing && <Loader2 className="animate-spin" />}
                            {edit
                                ? processing
                                    ? "Updating"
                                    : "Update"
                                : processing
                                ? "Saving"
                                : "Save"}
                        </Button>
                    </SheetFooter>
                </SheetContent>
            </Sheet>

            <AlertDialog open={showConfirmClose}>
                <AlertDialogContent>
                    <AlertDialogHeader>
                        <AlertDialogTitle>Discard changes?</AlertDialogTitle>
                        <AlertDialogDescription>
                            You have unsaved changes. Are you sure you want to
                            cancel?
                        </AlertDialogDescription>
                    </AlertDialogHeader>
                    <AlertDialogFooter>
                        <Button
                            variant="ghost"
                            onClick={() => setShowConfirmClose(false)}
                        >
                            No, keep editing
                        </Button>
                        <Button
                            variant="destructive"
                            onClick={() => {
                                setShowConfirmClose(false);
                                setOpen(false);
                            }}
                        >
                            Yes, discard
                        </Button>
                    </AlertDialogFooter>
                </AlertDialogContent>
            </AlertDialog>

            <AlertDialog open={showDelete.show}>
                <AlertDialogContent>
                    <AlertDialogHeader>
                        <AlertDialogTitle>{showDelete.title}</AlertDialogTitle>
                        <AlertDialogDescription>
                            Are you sure you want to permanently delete? This
                            action cannot be undone.
                        </AlertDialogDescription>
                    </AlertDialogHeader>
                    <AlertDialogFooter>
                        <Button
                            variant="ghost"
                            onClick={() =>
                                setShowDelete({
                                    id: null,
                                    title: "",
                                    show: false,
                                })
                            }
                            disabled={loadingDelete}
                        >
                            Cancel
                        </Button>
                        <Button
                            variant="destructive"
                            onClick={handleDelete}
                            disabled={loadingDelete}
                        >
                            {loadingDelete && (
                                <Loader2 className="animate-spin" />
                            )}
                            {loadingDelete ? "Deleting" : "Delete"}
                        </Button>
                    </AlertDialogFooter>
                </AlertDialogContent>
            </AlertDialog>
        </>
    );
}

News.layout = (page: ReactPortal) => <AppLayout children={page} />;
