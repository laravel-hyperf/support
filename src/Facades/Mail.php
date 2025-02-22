<?php

declare(strict_types=1);

namespace LaravelHyperf\Support\Facades;

use LaravelHyperf\Mail\Contracts\Factory as MailFactoryContract;
use LaravelHyperf\Support\Testing\Fakes\MailFake;

/**
 * @method static \LaravelHyperf\Mail\Contracts\Mailer mailer(string|null $name = null)
 * @method static \LaravelHyperf\Mail\Mailer driver(string|null $driver = null)
 * @method static \LaravelHyperf\Mail\Mailer build(array $config)
 * @method static \Symfony\Component\Mailer\Transport\TransportInterface createSymfonyTransport(array $config)
 * @method static string getDefaultDriver()
 * @method static void setDefaultDriver(string $name)
 * @method static void purge(string|null $name = null)
 * @method static \LaravelHyperf\Mail\MailManager extend(string $driver, \Closure $callback)
 * @method static \Psr\Container\ContainerInterface getApplication()
 * @method static \LaravelHyperf\Mail\MailManager setApplication(\Psr\Container\ContainerInterface $app)
 * @method static \LaravelHyperf\Mail\MailManager forgetMailers()
 * @method static void alwaysFrom(string $address, string|null $name = null)
 * @method static void alwaysReplyTo(string $address, string|null $name = null)
 * @method static void alwaysReturnPath(string $address)
 * @method static void alwaysTo(string $address, string|null $name = null)
 * @method static \LaravelHyperf\Mail\PendingMail to(mixed $users, string|null $name = null)
 * @method static \LaravelHyperf\Mail\PendingMail cc(mixed $users, string|null $name = null)
 * @method static \LaravelHyperf\Mail\PendingMail bcc(mixed $users, string|null $name = null)
 * @method static \LaravelHyperf\Mail\SentMessage|null html(string $html, mixed $callback)
 * @method static \LaravelHyperf\Mail\SentMessage|null raw(string $text, mixed $callback)
 * @method static \LaravelHyperf\Mail\SentMessage|null plain(string $view, array $data, mixed $callback)
 * @method static string render(string|array $view, array $data = [])
 * @method static \LaravelHyperf\Mail\SentMessage|null send(\LaravelHyperf\Mail\Contracts\Mailable|string|array $view, array $data = [], \Closure|string|null $callback = null)
 * @method static \LaravelHyperf\Mail\SentMessage|null sendNow(\LaravelHyperf\Mail\Contracts\Mailable|string|array $mailable, array $data = [], \Closure|string|null $callback = null)
 * @method static mixed queue(\LaravelHyperf\Mail\Contracts\Mailable|string|array $view, \BackedEnum|string|null $queue = null)
 * @method static mixed onQueue(\BackedEnum|string|null $queue, \LaravelHyperf\Mail\Contracts\Mailable $view)
 * @method static mixed queueOn(string $queue, \LaravelHyperf\Mail\Contracts\Mailable $view)
 * @method static mixed later(\DateTimeInterface|\DateInterval|int $delay, \LaravelHyperf\Mail\Contracts\Mailable $view, string|null $queue = null)
 * @method static mixed laterOn(string $queue, \DateTimeInterface|\DateInterval|int $delay, \LaravelHyperf\Mail\Contracts\Mailable $view)
 * @method static \Symfony\Component\Mailer\Transport\TransportInterface getSymfonyTransport()
 * @method static \Hyperf\ViewEngine\Contract\FactoryInterface getViewFactory()
 * @method static void setSymfonyTransport(\Symfony\Component\Mailer\Transport\TransportInterface $transport)
 * @method static void macro(string $name, object|callable $macro)
 * @method static void mixin(object $mixin, bool $replace = true)
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 * @method static void assertSent(string|\Closure $mailable, callable|array|string|int|null $callback = null)
 * @method static void assertNotOutgoing(string|\Closure $mailable, callable|null $callback = null)
 * @method static void assertNotSent(string|\Closure $mailable, callable|array|string|null $callback = null)
 * @method static void assertNothingOutgoing()
 * @method static void assertNothingSent()
 * @method static void assertQueued(string|\Closure $mailable, callable|array|string|int|null $callback = null)
 * @method static void assertNotQueued(string|\Closure $mailable, callable|array|string|null $callback = null)
 * @method static void assertNothingQueued()
 * @method static void assertSentCount(int $count)
 * @method static void assertQueuedCount(int $count)
 * @method static void assertOutgoingCount(int $count)
 * @method static \Hyperf\Collection\Collection sent(string|\Closure $mailable, callable|null $callback = null)
 * @method static bool hasSent(string $mailable)
 * @method static \Hyperf\Collection\Collection queued(string|\Closure $mailable, callable|null $callback = null)
 * @method static bool hasQueued(string $mailable)
 *
 * @see \LaravelHyperf\Mail\MailManager
 * @see \LaravelHyperf\Support\Testing\Fakes\MailFake
 */
class Mail extends Facade
{
    /**
     * Replace the bound instance with a fake.
     */
    public static function fake(): MailFake
    {
        $actualMailManager = static::isFake()
            ? static::getFacadeRoot()->manager
            : static::getFacadeRoot();

        return tap(new MailFake($actualMailManager), function ($fake) {
            static::swap($fake);
        });
    }

    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor()
    {
        return MailFactoryContract::class;
    }
}
