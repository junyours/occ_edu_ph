import {
    Card,
    CardDescription,
    CardHeader,
    CardTitle,
} from "@/components/ui/card";
import { PropsWithChildren } from "react";
import Logo from "../../../public/images/logo.png";
import { Link } from "@inertiajs/react";

export default function AuthLayout({ children }: PropsWithChildren) {
    return (
        <div className="min-h-screen flex items-center justify-center p-4">
            <Card className="w-full max-w-sm overflow-hidden">
                <div className="h-1 bg-primary"></div>
                <CardHeader>
                    <div className="flex justify-center mb-4">
                        <Link href={route("home")} className="shrink-0">
                            <img
                                src={Logo}
                                alt="occ-logo"
                                className="h-12 object-contain"
                            />
                        </Link>
                    </div>
                    <CardTitle>Login to your account</CardTitle>
                    <CardDescription>
                        Enter your email and password below to login to your
                        account.
                    </CardDescription>
                </CardHeader>
                {children}
            </Card>
        </div>
    );
}
