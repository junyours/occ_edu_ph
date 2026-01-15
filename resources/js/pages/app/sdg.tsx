import AppLayout from "@/layouts/app-layout";
import { ReactPortal, useEffect, useState } from "react";
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
import { router, useForm, usePage } from "@inertiajs/react";
import { PageProps } from "@/types";
import { debounce } from "lodash";
import { toast } from "sonner";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { Loader2, MoreHorizontal, Pencil, Plus, Trash } from "lucide-react";
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
import {
    AlertDialog,
    AlertDialogContent,
    AlertDialogDescription,
    AlertDialogFooter,
    AlertDialogHeader,
    AlertDialogTitle,
} from "@/components/ui/alert-dialog";

interface Sdg {
    id: number | null;
    name: string;
    image: File | null;
}

interface Props extends PageProps {
    search: string | undefined;
    sdgs: {
        data: Sdg[];
        current_page: number;
        last_page: number;
    };
}

export default function SDG() {
    const { search, sdgs, flash } = usePage<Props>().props;
    const { data, setData, post, processing, errors, clearErrors } =
        useForm<Sdg>({
            id: null,
            name: "",
            image: null,
        });
    const [open, setOpen] = useState(false);
    const [edit, setEdit] = useState(false);
    const [initialData, setInitialData] = useState<Sdg>();
    const [showConfirmClose, setShowConfirmClose] = useState(false);
    const [showDelete, setShowDelete] = useState<{
        id: number | null;
        name: string;
        show: boolean;
    }>({
        id: null,
        name: "",
        show: false,
    });
    const [loadingDelete, setLoadingDelete] = useState(false);

    const handleOpen = (edit = false, sdg: Sdg | null = null) => {
        clearErrors();
        setEdit(edit);

        if (edit && sdg) {
            const currentData = {
                id: sdg.id,
                name: sdg.name,
                image: null,
            };
            setData(currentData);
            setInitialData(currentData);
        } else {
            const newData = {
                id: null,
                name: "",
                image: null,
            };
            setData(newData);
            setInitialData(newData);
        }

        setOpen(!open);
    };

    const handleSearch = debounce((value: string) => {
        router.get(
            "/admin/sdg",
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
        post("/admin/sdg/add", {
            onSuccess: () => {
                handleOpen();
                toast.success("SDG created successfully.");
            },
            preserveState: true,
            preserveScroll: true,
        });
    };

    const handleUpdate = () => {
        clearErrors();
        post("/admin/sdg/update", {
            onSuccess: () => {
                handleOpen();
                toast.success("SDG updated successfully.");
            },
            preserveState: true,
            preserveScroll: true,
        });
    };

    const handleDelete = () => {
        setLoadingDelete(true);
        clearErrors();
        router.post(
            "/admin/sdg/delete",
            { id: showDelete.id },
            {
                onSuccess: () => {
                    toast.success("SDG deleted successfully.");
                },
                onFinish: () => {
                    setLoadingDelete(false);
                    setShowDelete({
                        id: null,
                        name: "",
                        show: false,
                    });
                },
                preserveState: true,
                preserveScroll: true,
            }
        );
    };

    useEffect(() => {
        if (flash.error) toast.error(flash.error);
    }, [flash]);

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
                            <TableHead>Name</TableHead>
                            <TableHead className="text-right"></TableHead>
                        </TableRow>
                    </TableHeader>
                    <TableBody>
                        {sdgs.data.map((sdg) => (
                            <TableRow key={sdg.id}>
                                <TableCell>
                                    <div className="size-12">
                                        <img
                                            src={`https://lh3.googleusercontent.com/d/${sdg.image}`}
                                            alt={sdg.name}
                                            className="size-full object-contain"
                                        />
                                    </div>
                                </TableCell>
                                <TableCell className="uppercase">
                                    {sdg.name}
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
                                                    handleOpen(true, sdg)
                                                }
                                                className="text-primary"
                                            >
                                                <Pencil />
                                                Edit
                                            </DropdownMenuItem>
                                            <DropdownMenuItem
                                                onClick={() =>
                                                    setShowDelete({
                                                        id: sdg.id,
                                                        name: sdg.name,
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
                                    sdgs.current_page > 1
                                        ? ""
                                        : "pointer-events-none opacity-50"
                                )}
                                onClick={() =>
                                    sdgs.current_page > 1 &&
                                    router.get(
                                        "/admin/sdg",
                                        {
                                            page: sdgs.current_page - 1,
                                            search: search ?? "",
                                        },
                                        { preserveState: true }
                                    )
                                }
                            />
                        </PaginationItem>
                        {Array.from(
                            { length: sdgs.last_page },
                            (_, i) => i + 1
                        ).map((page) => (
                            <PaginationItem key={page}>
                                <PaginationLink
                                    isActive={page === sdgs.current_page}
                                    onClick={(e) => {
                                        e.preventDefault();
                                        router.get(
                                            "/admin/sdg",
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
                                    sdgs.current_page < sdgs.last_page
                                        ? ""
                                        : "pointer-events-none opacity-50"
                                )}
                                onClick={() =>
                                    sdgs.current_page < sdgs.last_page &&
                                    router.get(
                                        "/admin/sdg",
                                        {
                                            page: sdgs.current_page + 1,
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
                        <SheetTitle>{edit ? "Edit" : "Create"} SDG</SheetTitle>
                    </SheetHeader>
                    <div className="flex-1 overflow-y-auto space-y-4 p-2">
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
                            <Label>Name</Label>
                            <Input
                                value={data.name}
                                onChange={(e) =>
                                    setData("name", e.target.value)
                                }
                            />
                            <InputError message={errors.name} />
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
                        <AlertDialogTitle className="uppercase">
                            {showDelete.name}
                        </AlertDialogTitle>
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
                                    name: "",
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

SDG.layout = (page: ReactPortal) => <AppLayout children={page} />;
