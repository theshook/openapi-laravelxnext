/* tslint:disable */
/* eslint-disable */
/**
 * Practice API Documentation
 * Practice API description
 *
 * The version of the OpenAPI document: 1.0.0
 * Contact: admin@admin.com
 *
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

import { exists, mapValues } from '../runtime';
import type { User1Inner } from './User1Inner';
import {
    User1InnerFromJSON,
    User1InnerFromJSONTyped,
    User1InnerToJSON,
} from './User1Inner';

/**
 * 
 * @export
 * @interface PaginatedUserAllOf
 */
export interface PaginatedUserAllOf {
    /**
     * 
     * @type {Array<User1Inner>}
     * @memberof PaginatedUserAllOf
     */
    data?: Array<User1Inner>;
}

/**
 * Check if a given object implements the PaginatedUserAllOf interface.
 */
export function instanceOfPaginatedUserAllOf(value: object): boolean {
    let isInstance = true;

    return isInstance;
}

export function PaginatedUserAllOfFromJSON(json: any): PaginatedUserAllOf {
    return PaginatedUserAllOfFromJSONTyped(json, false);
}

export function PaginatedUserAllOfFromJSONTyped(json: any, ignoreDiscriminator: boolean): PaginatedUserAllOf {
    if ((json === undefined) || (json === null)) {
        return json;
    }
    return {
        
        'data': !exists(json, 'data') ? undefined : ((json['data'] as Array<any>).map(User1InnerFromJSON)),
    };
}

export function PaginatedUserAllOfToJSON(value?: PaginatedUserAllOf | null): any {
    if (value === undefined) {
        return undefined;
    }
    if (value === null) {
        return null;
    }
    return {
        
        'data': value.data === undefined ? undefined : ((value.data as Array<any>).map(User1InnerToJSON)),
    };
}
