<?php
/*
 * Copyright 2024 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/apps/events/subscriptions/v1/subscriptions_service.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Apps\Events\Subscriptions\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\LongRunning\OperationsClient;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Apps\Events\Subscriptions\V1\CreateSubscriptionRequest;
use Google\Apps\Events\Subscriptions\V1\DeleteSubscriptionRequest;
use Google\Apps\Events\Subscriptions\V1\GetSubscriptionRequest;
use Google\Apps\Events\Subscriptions\V1\ListSubscriptionsRequest;
use Google\Apps\Events\Subscriptions\V1\ReactivateSubscriptionRequest;
use Google\Apps\Events\Subscriptions\V1\Subscription;
use Google\Apps\Events\Subscriptions\V1\UpdateSubscriptionRequest;
use Google\Auth\FetchAuthTokenInterface;
use Google\LongRunning\Operation;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: A service that manages subscriptions to Google Workspace events.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface createSubscriptionAsync(CreateSubscriptionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface deleteSubscriptionAsync(DeleteSubscriptionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface getSubscriptionAsync(GetSubscriptionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface listSubscriptionsAsync(ListSubscriptionsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface reactivateSubscriptionAsync(ReactivateSubscriptionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface updateSubscriptionAsync(UpdateSubscriptionRequest $request, array $optionalArgs = [])
 */
final class SubscriptionsServiceClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.apps.events.subscriptions.v1.SubscriptionsService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'workspaceevents.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'workspaceevents.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/chat.bot',
        'https://www.googleapis.com/auth/chat.memberships',
        'https://www.googleapis.com/auth/chat.memberships.readonly',
        'https://www.googleapis.com/auth/chat.messages',
        'https://www.googleapis.com/auth/chat.messages.reactions',
        'https://www.googleapis.com/auth/chat.messages.reactions.readonly',
        'https://www.googleapis.com/auth/chat.messages.readonly',
        'https://www.googleapis.com/auth/chat.spaces',
        'https://www.googleapis.com/auth/chat.spaces.readonly',
        'https://www.googleapis.com/auth/meetings.space.created',
        'https://www.googleapis.com/auth/meetings.space.readonly',
    ];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/subscriptions_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/subscriptions_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/subscriptions_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/subscriptions_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning'])
            ? $this->descriptors[$methodName]['longRunning']
            : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
    }

    /**
     * Formats a string containing the fully-qualified path to represent a subscription
     * resource.
     *
     * @param string $subscription
     *
     * @return string The formatted subscription resource.
     */
    public static function subscriptionName(string $subscription): string
    {
        return self::getPathTemplate('subscription')->render([
            'subscription' => $subscription,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a topic
     * resource.
     *
     * @param string $project
     * @param string $topic
     *
     * @return string The formatted topic resource.
     */
    public static function topicName(string $project, string $topic): string
    {
        return self::getPathTemplate('topic')->render([
            'project' => $project,
            'topic' => $topic,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a user
     * resource.
     *
     * @param string $user
     *
     * @return string The formatted user resource.
     */
    public static function userName(string $user): string
    {
        return self::getPathTemplate('user')->render([
            'user' => $user,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - subscription: subscriptions/{subscription}
     * - topic: projects/{project}/topics/{topic}
     * - user: users/{user}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'workspaceevents.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates a Google Workspace subscription. To learn how to use this
     * method, see [Create a Google Workspace
     * subscription](https://developers.google.com/workspace/events/guides/create-subscription).
     *
     * The async variant is
     * {@see SubscriptionsServiceClient::createSubscriptionAsync()} .
     *
     * @example samples/V1/SubscriptionsServiceClient/create_subscription.php
     *
     * @param CreateSubscriptionRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createSubscription(CreateSubscriptionRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('CreateSubscription', $request, $callOptions)->wait();
    }

    /**
     * Deletes a Google Workspace subscription.
     * To learn how to use this method, see [Delete a Google Workspace
     * subscription](https://developers.google.com/workspace/events/guides/delete-subscription).
     *
     * The async variant is
     * {@see SubscriptionsServiceClient::deleteSubscriptionAsync()} .
     *
     * @example samples/V1/SubscriptionsServiceClient/delete_subscription.php
     *
     * @param DeleteSubscriptionRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteSubscription(DeleteSubscriptionRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('DeleteSubscription', $request, $callOptions)->wait();
    }

    /**
     * Gets details about a Google Workspace subscription. To learn how to use
     * this method, see [Get details about a Google Workspace
     * subscription](https://developers.google.com/workspace/events/guides/get-subscription).
     *
     * The async variant is {@see SubscriptionsServiceClient::getSubscriptionAsync()} .
     *
     * @example samples/V1/SubscriptionsServiceClient/get_subscription.php
     *
     * @param GetSubscriptionRequest $request     A request to house fields associated with the call.
     * @param array                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Subscription
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getSubscription(GetSubscriptionRequest $request, array $callOptions = []): Subscription
    {
        return $this->startApiCall('GetSubscription', $request, $callOptions)->wait();
    }

    /**
     * Lists Google Workspace subscriptions. To learn how to use this method, see
     * [List Google Workspace
     * subscriptions](https://developers.google.com/workspace/events/guides/list-subscriptions).
     *
     * The async variant is {@see SubscriptionsServiceClient::listSubscriptionsAsync()}
     * .
     *
     * @example samples/V1/SubscriptionsServiceClient/list_subscriptions.php
     *
     * @param ListSubscriptionsRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listSubscriptions(ListSubscriptionsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListSubscriptions', $request, $callOptions);
    }

    /**
     * Reactivates a suspended Google Workspace subscription.
     *
     * This method resets your subscription's `State` field to `ACTIVE`. Before
     * you use this method, you must fix the error that suspended the
     * subscription. To learn how to use this method, see [Reactivate a Google
     * Workspace
     * subscription](https://developers.google.com/workspace/events/guides/reactivate-subscription).
     *
     * The async variant is
     * {@see SubscriptionsServiceClient::reactivateSubscriptionAsync()} .
     *
     * @example samples/V1/SubscriptionsServiceClient/reactivate_subscription.php
     *
     * @param ReactivateSubscriptionRequest $request     A request to house fields associated with the call.
     * @param array                         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function reactivateSubscription(
        ReactivateSubscriptionRequest $request,
        array $callOptions = []
    ): OperationResponse {
        return $this->startApiCall('ReactivateSubscription', $request, $callOptions)->wait();
    }

    /**
     * Updates or renews a Google Workspace subscription. To learn how to use this
     * method, see [Update or renew a Google Workspace
     * subscription](https://developers.google.com/workspace/events/guides/update-subscription).
     *
     * The async variant is
     * {@see SubscriptionsServiceClient::updateSubscriptionAsync()} .
     *
     * @example samples/V1/SubscriptionsServiceClient/update_subscription.php
     *
     * @param UpdateSubscriptionRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateSubscription(UpdateSubscriptionRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('UpdateSubscription', $request, $callOptions)->wait();
    }
}