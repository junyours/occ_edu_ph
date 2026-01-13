import { CardContent, CardFooter } from "@/components/ui/card";
import AuthLayout from "@/layouts/auth-layout";
import { ReactPortal } from "react";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Button } from "@/components/ui/button";
import { useForm } from "@inertiajs/react";
import InputError from "@/components/input-error";
import { Loader2 } from "lucide-react";

export default function Login() {
    const { data, setData, post, processing, errors, clearErrors } = useForm({
        email: "",
        password: "",
    });

    const handleLogin = (e: { preventDefault: () => void }) => {
        e.preventDefault();
        clearErrors();
        post(route("login"));
    };

    return (
        <form onSubmit={handleLogin}>
            <CardContent className="space-y-4">
                <div className="grid w-full max-w-sm items-center gap-2">
                    <Label htmlFor="email">Email</Label>
                    <Input
                        value={data.email}
                        onChange={(e) => setData("email", e.target.value)}
                        type="email"
                        id="email"
                    />
                    <InputError message={errors.email} />
                </div>
                <div className="grid w-full max-w-sm items-center gap-2">
                    <Label htmlFor="password">Password</Label>
                    <Input
                        value={data.password}
                        onChange={(e) => setData("password", e.target.value)}
                        type="password"
                        id="password"
                    />
                    <InputError message={errors.password} />
                </div>
            </CardContent>
            <CardFooter>
                <Button className="w-full" disabled={processing}>
                    {processing && <Loader2 className="animate-spin" />}
                    {processing ? "Logging in" : "Log in"}
                </Button>
            </CardFooter>
        </form>
    );
}

Login.layout = (page: ReactPortal) => <AuthLayout children={page} />;
